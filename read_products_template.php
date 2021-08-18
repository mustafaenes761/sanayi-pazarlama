<?php
      // connect to database
      include 'config/database.php';

      // include objects
      include_once "objects/product.php";
      include_once "objects/product_image.php";
      include_once "objects/cart_item.php";


      // get database connection
      $database = new Database();
      $db = $database->getConnection();

      // set page title
      $page_title="Products";

      // page header html
      include 'layout_head.php';

      // initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);
      $cart_item = new CartItem($db);


      // to prevent undefined index notice
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      // for pagination purposes
      // page is the current page, if there's nothing set, default is page 1
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      // set records or rows of data per page
      $records_per_page = 6;
      // calculate for the query LIMIT clause
      $from_record_num = ($records_per_page * $page) - $records_per_page;


      //read all products in the database
      $stmt = $product->read($from_record_num, $records_per_page);

      //count number of retrieved products
      $num = $stmt->rowCount();

      //if products retrieved are more than zeror
      if($num > 0){
        //used for pagination
        $page_url = "products.php";
        $total_rows = $product->count();

        //show the products
        include_once "read_products_template.php";
      }else{
        echo "<div class='col-md-12'>";
          echo "<div class='alert alert-danger'>No products found.</div>";
        echo "</div>";
      }

      // layout footer code
      include 'layout_foot.php';
?>
<?php
      // connect to database
      include 'config/database.php';

      // include objects
      include_once "objects/product.php";
      include_once "objects/product_image.php";
      include_once "objects/cart_item.php";


      // get database connection
      $database = new Database();
      $db = $database->getConnection();

      // set page title
      $page_title="Products";

      // page header html
      include 'layout_head.php';

      // initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);
      $cart_item = new CartItem($db);


      // to prevent undefined index notice
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      // for pagination purposes
      // page is the current page, if there's nothing set, default is page 1
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      // set records or rows of data per page
      $records_per_page = 6;
      // calculate for the query LIMIT clause
      $from_record_num = ($records_per_page * $page) - $records_per_page;


      //read all products in the database
      $stmt = $product->read($from_record_num, $records_per_page);

      //count number of retrieved products
      $num = $stmt->rowCount();

      //if products retrieved are more than zeror
      if($num > 0){
        //used for pagination
        $page_url = "products.php";
        $total_rows = $product->count();

        //show the products
        include_once "read_products_template.php";
      }else{
        echo "<div class='col-md-12'>";
          echo "<div class='alert alert-danger'>No products found.</div>";
        echo "</div>";
      }

      // layout footer code
      include 'layout_foot.php';
?>
<?php
      // connect to database
      include 'config/database.php';

      // include objects
      include_once "objects/product.php";
      include_once "objects/product_image.php";
      include_once "objects/cart_item.php";


      // get database connection
      $database = new Database();
      $db = $database->getConnection();

      // set page title
      $page_title="Products";

      // page header html
      include 'layout_head.php';

      // initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);
      $cart_item = new CartItem($db);


      // to prevent undefined index notice
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      // for pagination purposes
      // page is the current page, if there's nothing set, default is page 1
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      // set records or rows of data per page
      $records_per_page = 6;
      // calculate for the query LIMIT clause
      $from_record_num = ($records_per_page * $page) - $records_per_page;


      //read all products in the database
      $stmt = $product->read($from_record_num, $records_per_page);

      //count number of retrieved products
      $num = $stmt->rowCount();

      //if products retrieved are more than zeror
      if($num > 0){
        //used for pagination
        $page_url = "products.php";
        $total_rows = $product->count();

        //show the products
        include_once "read_products_template.php";
      }else{
        echo "<div class='col-md-12'>";
          echo "<div class='alert alert-danger'>No products found.</div>";
        echo "</div>";
      }

      // layout footer code
      include 'layout_foot.php';
?>
<?php
      // connect to database
      include 'config/database.php';

      // include objects
      include_once "objects/product.php";
      include_once "objects/product_image.php";
      include_once "objects/cart_item.php";


      // get database connection
      $database = new Database();
      $db = $database->getConnection();

      // set page title
      $page_title="Products";

      // page header html
      include 'layout_head.php';

      // initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);
      $cart_item = new CartItem($db);


      // to prevent undefined index notice
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      // for pagination purposes
      // page is the current page, if there's nothing set, default is page 1
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      // set records or rows of data per page
      $records_per_page = 6;
      // calculate for the query LIMIT clause
      $from_record_num = ($records_per_page * $page) - $records_per_page;


      //read all products in the database
      $stmt = $product->read($from_record_num, $records_per_page);

      //count number of retrieved products
      $num = $stmt->rowCount();

      //if products retrieved are more than zeror
      if($num > 0){
        //used for pagination
        $page_url = "products.php";
        $total_rows = $product->count();

        //show the products
        include_once "read_products_template.php";
      }else{
        echo "<div class='col-md-12'>";
          echo "<div class='alert alert-danger'>No products found.</div>";
        echo "</div>";
      }

      // layout footer code
      include 'layout_foot.php';
?>
<?php
      // connect to database
      include 'config/database.php';

      // include objects
      include_once "objects/product.php";
      include_once "objects/product_image.php";
      include_once "objects/cart_item.php";


      // get database connection
      $database = new Database();
      $db = $database->getConnection();

      // set page title
      $page_title="Products";

      // page header html
      include 'layout_head.php';

      // initialize objects
      $product = new Product($db);
      $product_image = new ProductImage($db);
      $cart_item = new CartItem($db);


      // to prevent undefined index notice
      $action = isset($_GET['action']) ? $_GET['action'] : "";

      // for pagination purposes
      // page is the current page, if there's nothing set, default is page 1
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      // set records or rows of data per page
      $records_per_page = 6;
      // calculate for the query LIMIT clause
      $from_record_num = ($records_per_page * $page) - $records_per_page;


      //read all products in the database
      $stmt = $product->read($from_record_num, $records_per_page);

      //count number of retrieved products
      $num = $stmt->rowCount();

      //if products retrieved are more than zeror
      if($num > 0){
        //used for pagination
        $page_url = "products.php";
        $total_rows = $product->count();

        //show the products
        include_once "read_products_template.php";
      }else{
        echo "<div class='col-md-12'>";
          echo "<div class='alert alert-danger'>No products found.</div>";
        echo "</div>";
      }

      // layout footer code
      include 'layout_foot.php';
?>
remove_from_cart.php

<?php
  // get the product id
  $product_id = isset($_GET['id']) ? $_GET['id'] : "";

  // connect to database
  include 'config/database.php';

  // include object
  include_once "objects/cart_item.php";

  // get database connection
  $database = new Database();
  $db = $database->getConnection();

  // initialize objects
  $cart_item = new CartItem($db);

  // remove cart item from database
  $cart_item->user_id=1; // we default to '1' because we do not have logged in user
  $cart_item->product_id=$product_id;
  $cart_item->delete();

  // redirect to product list and tell the user it was added to cart
  header('Location: cart.php?action=removed&id=' . $id);
?>
update_quantity.php

<?php
  // get the product id
  $product_id = isset($_GET['id']) ? $_GET['id'] : 1;
  $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

  $quantity=$quantity<=0 ? 0 : $quantity;

  // connect to database
  include 'config/database.php';

  // include object
  include_once "objects/cart_item.php";

  // get database connection
  $database = new Database();
  $db = $database->getConnection();

  // initialize objects
  $cart_item = new CartItem($db);

  // set cart item values
  $cart_item->user_id=1; // we default to '1' because we do not have logged in user
  $cart_item->product_id=$product_id;
  $cart_item->quantity=$quantity;

  // add to cart
  if($cart_item->update()){
      // redirect to product list and tell the user it was added to cart
      header("Location: cart.php?action=updated");
  }else{
      header("Location: cart.php?action=unable_to_update");
  }
?>
Inside folder  config > database.php

<?php
/**
 * used to get a connection to the mysql database
 */
class Database {

  private $host = "localhost";
  private $db_name = "website";
  private $username = "test";
  private $password = "test";
  public $conn;

  //get the db connection
  public function getConnection(){
    $this->conn = null;

    try{
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
    }catch(PDOException $exception){
      echo "Connection error: " . $exception->getMessage();
    }

    return $this->conn;
  }
}
?>
