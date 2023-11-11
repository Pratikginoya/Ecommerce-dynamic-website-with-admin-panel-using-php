<?php include_once 'header.php';

if (isset($_GET['e_id']))
{
    $edit_id = $_GET['e_id'];
}

$sql_select = "select * from `product` where `id`='$edit_id'";
$data = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_assoc($data);

$tag = explode(', ',$row['tag']);
$tag_length = count($tag);

$size = explode(', ',$row['size']);
$size_length = count($size);

$color = explode(', ',$row['color']);
$color_length = count($color);


if (isset($_POST['edited_product']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $tag = implode(', ',$_POST['tag']);
    $type = $_POST['type'];
    $size = implode(', ',$_POST['size']);
    $color = implode(', ',$_POST['color']);
    $one_line_title = $_POST['one_line_title'];
    $description = $_POST['description'];
    $weight = $_POST['weight'];
    $dimension = $_POST['dimension'];
    $material = $_POST['material'];
    $stock = $_POST['stock'];

    $image1_e = $_FILES['image1']['name'];
    if ($image1_e=="")
    {
        $image1=$row['image1'];
    }
    else
    {
        unlink('image/'.$row['image1']);

        $image1 = rand(1,1000000).$_FILES['image1']['name'];
        $path1 = 'image/'.$image1;
        move_uploaded_file($_FILES['image1']['tmp_name'],$path1);
    }

    $image2_e = $_FILES['image2']['name'];
    if ($image2_e=="")
    {
        $image2=$row['image2'];
    }
    else
    {
        unlink('image/'.$row['image2']);

        $image2 = rand(1,1000000).$_FILES['image2']['name'];
        $path2 = 'image/'.$image2;
        move_uploaded_file($_FILES['image2']['tmp_name'],$path2);
    }

    $image3_e = $_FILES['image3']['name'];
    if ($image3_e=="")
    {
        $image3=$row['image3'];
    }
    else
    {
        unlink('image/'.$row['image3']);

        $image3 = rand(1,1000000).$_FILES['image3']['name'];
        $path3 = 'image/'.$image3;
        move_uploaded_file($_FILES['image3']['tmp_name'],$path3);
    }


    $sql_update = "update `product` set `name`='$name',`price`='$price',`category`='$category',`tag`='$tag',`type`='$type',`one_line_title`='$one_line_title',`size`='$size',`color`='$color',`description`='$description',`weight`='$weight',`dimension`='$dimension',`material`='$material',`image1`='$image1',`image2`='$image2',`image3`='$image3',`stock`='$stock' where `id`='$edit_id'";
    mysqli_query($conn,$sql_update);

    $sql_update_cart = "update `cart` set `name`='$name',`price`='$price',`image`='$image1' where `product_id`='$edit_id'";
    mysqli_query($conn,$sql_update_cart);

    header('location:view-more-product.php?v_id='.$row['id']);

} 

?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit This Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stock</label>
                    <select class="form-control" name="stock" required>
                      <option selected disabled>-Select Avilability of Product-</option>
                      <option <?php if($row['stock']=="In Stock"){echo "selected";} ?>>In Stock</option>
                      <option <?php if($row['stock']=="Out of Stock"){echo "selected";} ?>>Out of Stock</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name/Title of Product</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title of New Photo" name="name" maxlength="40" required value="<?php echo @$row['name']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" maxlength="50" placeholder="Enter Some Details of New Photo" name="price" maxlength="50" required value="<?php echo @$row['price']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Category of Product</label>
                    <select class="form-control" name="category" required>
                      <option selected disabled>-Select Category of Product-</option>
                      <option <?php if($row['category']=="Women"){echo "selected";} ?>>Women</option>
                      <option <?php if($row['category']=="Men"){echo "selected";} ?>>Men</option>
                      <option <?php if($row['category']=="Accessories"){echo "selected";} ?>>Accessories</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Tag of Product (As per the offer)</label>
                      <div>
                        <input type="checkbox" name="tag[]" value="Best-seller" 
                        <?php 
                        for($i=0; $i<$tag_length; $i++)
                          { 
                            if($tag[$i]=="Best-seller")
                              {echo "checked";}
                          } 
                        ?>> Best-seller <br>
                        <input type="checkbox" name="tag[]" value="Featured"
                        <?php 
                        for($i=0; $i<$tag_length; $i++)
                          { 
                            if($tag[$i]=="Featured")
                              {echo "checked";}
                          } 
                        ?>> Featured <br>
                        <input type="checkbox" name="tag[]" value="Sale"
                        <?php 
                        for($i=0; $i<$tag_length; $i++)
                          { 
                            if($tag[$i]=="Sale")
                              {echo "checked";}
                          } 
                        ?>> Sale <br>
                        <input type="checkbox" name="tag[]" value="Top-rate"
                        <?php 
                        for($i=0; $i<$tag_length; $i++)
                          { 
                            if($tag[$i]=="Top-rate")
                              {echo "checked";}
                          } 
                        ?>> Top-rate <br>
                     </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Type of Product</label>
                    <select class="form-control" name="type" required>
                      <option selected disabled>-Select Type of Product-</option>
                      <option <?php if($row['type']=="Shirt"){echo "selected";} ?>>Shirt</option>
                      <option <?php if($row['type']=="T-shirt"){echo "selected";} ?>>T-shirt</option>
                      <option <?php if($row['type']=="Jeans"){echo "selected";} ?>>Jeans</option>
                      <option <?php if($row['type']=="Cotton-pent"){echo "selected";} ?>>Cotton-pent</option>
                      <option <?php if($row['type']=="Top"){echo "selected";} ?>>Top</option>
                      <option <?php if($row['type']=="Kurti"){echo "selected";} ?>>Kurti</option>
                      <option <?php if($row['type']=="Sarwar"){echo "selected";} ?>>Sarwar</option>
                      <option <?php if($row['type']=="Capri"){echo "selected";} ?>>Capri</option>
                      <option <?php if($row['type']=="Belt"){echo "selected";} ?>>Belt</option>
                      <option <?php if($row['type']=="Gogles"){echo "selected";} ?>>Gogles</option>
                      <option <?php if($row['type']=="Purse"){echo "selected";} ?>>Purse</option>
                      <option <?php if($row['type']=="Cap"){echo "selected";} ?>>Cap</option>
                      <option <?php if($row['type']=="Shoes"){echo "selected";} ?>>Shoes</option>
                      <option <?php if($row['type']=="Socks"){echo "selected";} ?>>Socks</option>
                      <option <?php if($row['type']=="Watch"){echo "selected";} ?>>Watch</option>
                      <option <?php if($row['type']=="Bag"){echo "selected";} ?>>Bag</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Select Avilable Size of Product</label>
                      <div>
                        <input type="checkbox" name="size[]" value="S - Small"
                        <?php 
                        for($i=0; $i<$size_length; $i++)
                          { 
                            if($size[$i]=="S - Small")
                              {echo "checked";}
                          } 
                        ?>> S - Small <br>
                        <input type="checkbox" name="size[]" value="M - Medium"
                        <?php 
                        for($i=0; $i<$size_length; $i++)
                          { 
                            if($size[$i]=="M - Medium")
                              {echo "checked";}
                          } 
                        ?>> M - Medium <br>
                        <input type="checkbox" name="size[]" value="L - Large"
                        <?php 
                        for($i=0; $i<$size_length; $i++)
                          { 
                            if($size[$i]=="L - Large")
                              {echo "checked";}
                          } 
                        ?>> L - Large <br>
                        <input type="checkbox" name="size[]" value="XL - Extra Large"
                        <?php 
                        for($i=0; $i<$size_length; $i++)
                          { 
                            if($size[$i]=="XL - Extra Large")
                              {echo "checked";}
                          } 
                        ?>> XL - Extra Large <br>
                        <input type="checkbox" name="size[]" value="XXL - Extra Extra Large"
                        <?php 
                        for($i=0; $i<$size_length; $i++)
                          { 
                            if($size[$i]=="XXL - Extra Extra Large")
                              {echo "checked";}
                          } 
                        ?>> XXL - Extra Extra Large <br>
                     </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Select Available Color of Product</label>
                      <div>
                        <input type="checkbox" name="color[]" value="Black"
                        <?php 
                        for($i=0; $i<$color_length; $i++)
                          { 
                            if($color[$i]=="Black")
                              {echo "checked";}
                          } 
                        ?>> Black <br>
                        <input type="checkbox" name="color[]" value="Blue"
                        <?php 
                        for($i=0; $i<$color_length; $i++)
                          { 
                            if($color[$i]=="Blue")
                              {echo "checked";}
                          } 
                        ?>> Blue <br>
                        <input type="checkbox" name="color[]" value="Gray"
                        <?php 
                        for($i=0; $i<$color_length; $i++)
                          { 
                            if($color[$i]=="Gray")
                              {echo "checked";}
                          } 
                        ?>> Gray <br>
                        <input type="checkbox" name="color[]" value="Green"
                        <?php 
                        for($i=0; $i<$color_length; $i++)
                          { 
                            if($color[$i]=="Green")
                              {echo "checked";}
                          } 
                        ?>> Green <br>
                        <input type="checkbox" name="color[]" value="Red"
                        <?php 
                        for($i=0; $i<$color_length; $i++)
                          { 
                            if($color[$i]=="Red")
                              {echo "checked";}
                          } 
                        ?>> Red <br>
                        <input type="checkbox" name="color[]" value="White"
                        <?php 
                        for($i=0; $i<$color_length; $i++)
                          { 
                            if($color[$i]=="White")
                              {echo "checked";}
                          } 
                        ?>> White <br>
                     </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">One Line Title of Product</label>
                    <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter One Line Title of Product" name="one_line_title" maxlength="100" required><?php echo $row['one_line_title']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Description of Product</label>
                    <textarea rows="10" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Description of Product" name="description" maxlength="500" required><?php echo $row['description']; ?></textarea>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Weight of Product (in KG)</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Weight of Product" name="weight" maxlength="10" required value="<?php echo $row['weight']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Dimensions of Product (in CM)</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Dimensions of Product" name="dimension" maxlength="20" required value="<?php echo $row['dimension']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Type of Material used in Product</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter type of materail used in product" name="material" maxlength="50" required value="<?php echo $row['material']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image 1 (Main Image)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image1">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label></div>
                    </div> 
                  </div>
                   <label for="exampleInputFile">Current Image-1 (Main Image) of Product</label>
                        <div style="width: 200px; height: 200px;">
                            <img src="image/<?php echo $row['image1']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;">
                        </div>
                  <br>  

                  <div class="form-group">
                    <label for="exampleInputFile">Image 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image2">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div> 
                  </div>
                  <label for="exampleInputFile">Current Image-2 of Product</label>
                        <div style="width: 200px; height: 200px;">
                            <img src="image/<?php echo $row['image2']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;">
                        </div>
                  <br>

                  <div class="form-group">
                    <label for="exampleInputFile">Image 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image3">
                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                      </div>
                    </div> 
                  </div>
                  <label for="exampleInputFile">Current Image-3 of Product</label>
                  <div style="width: 200px; height: 200px;">
                      <img src="image/<?php echo $row['image3']; ?>" style="height: 100%; width: 100%; object-fit: cover; object-position: top;">
                  </div>

                <!-- /.card-body -->
           
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="edited_product">Submit</button>
                </div>

              </div>
              </form>
            </div>
            <!-- /.card -->
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once 'scripts.php'; ?>