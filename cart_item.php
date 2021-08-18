art_item.php

<?php
// A cart item object
class CartItem{

      // database connection and table name
      private $conn;
      private $table_name = "cart_items";

      //object properties
      public $id;
      public $product_id;
      public $quantity;
      public $user_id;
      public $created;
      public $modified;

      //constructor
      public function __construct($db){
        $this->conn = $db;
      }

      // check if a cart item exists
      public function exists(){
        // query to count existing cart item
        $query = "SELECT count(*) FROM " . $this->table_name . " WHERE product_id=:product_id AND user_id=:user_id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->product_id=htmlspecialchars(strip_tags($this->product_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // bind category id variable
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":user_id", $this->user_id);

        // execute query
        $stmt->execute();

        // get row value
        $rows = $stmt->fetch(PDO::FETCH_NUM);

        // return
        if($rows[0]>0){
            return true;
        }

        return false;
      }

      //count user's items in the cart
      public function count(){
        //query to count existing user's cart items
        $query = "SELECT count(*) FROM " . $this->table_name . " WHERE user_id=:user_id";

        //prepare the query statement
        $stmt = $this->conn->prepare($query);

        //sanitize
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        //bind category id variable
        $stmt->bindParam(":user_id", $this->user_id);

        //execute query
        $stmt->execute();

        //get row value
        $rows = $stmt->fetch(PDO::FETCH_NUM);

        return $rows[0];
      }

      // create cart item record
      function create(){
        // to get times-tamp for 'created' field
        $this->created=date('Y-m-d H:i:s');

        // query to insert cart item record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    product_id = :product_id,
                    quantity = :quantity,
                    user_id = :user_id,
                    created = :created";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->product_id=htmlspecialchars(strip_tags($this->product_id));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // bind values
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":created", $this->created);

        // execute query
        if($stmt->execute()){
          return true;
        }

        return false;
      }

      // read items in the cart
      public function read(){

          $query="SELECT p.id, p.name, p.price, ci.quantity, ci.quantity * p.price AS subtotal
                  FROM " . $this->table_name . " ci
                      LEFT JOIN products p
                          ON ci.product_id = p.id
                  WHERE ci.user_id=:user_id";

          // prepare query statement
          $stmt = $this->conn->prepare($query);

          // sanitize
          $this->user_id=htmlspecialchars(strip_tags($this->user_id));

          // bind value
          $stmt->bindParam(":user_id", $this->user_id, PDO::PARAM_INT);

          // execute query
          $stmt->execute();

          // return values
          return $stmt;
      }

      // create cart item record
      function update(){

          // query to insert cart item record
          $query = "UPDATE " . $this->table_name . "
                  SET quantity=:quantity
                  WHERE product_id=:product_id AND user_id=:user_id";

          // prepare query statement
          $stmt = $this->conn->prepare($query);

          // sanitize
          $this->quantity=htmlspecialchars(strip_tags($this->quantity));
          $this->product_id=htmlspecialchars(strip_tags($this->product_id));
          $this->user_id=htmlspecialchars(strip_tags($this->user_id));

          // bind values
          $stmt->bindParam(":quantity", $this->quantity);
          $stmt->bindParam(":product_id", $this->product_id);
          $stmt->bindParam(":user_id", $this->user_id);

          // execute query
          if($stmt->execute()){
              return true;
          }

          return false;
      }

      // remove cart item by user and product
      public function delete(){

          // delete query
          $query = "DELETE FROM " . $this->table_name . " WHERE product_id=:product_id AND user_id=:user_id";
          $stmt = $this->conn->prepare($query);

          // sanitize
          $this->product_id=htmlspecialchars(strip_tags($this->product_id));
          $this->user_id=htmlspecialchars(strip_tags($this->user_id));

          // bind ids
          $stmt->bindParam(":product_id", $this->product_id);
          $stmt->bindParam(":user_id", $this->user_id);

          if($stmt->execute()){
              return true;
          }

          return false;
      }

      // remove cart items by user
      public function deleteByUser(){
          // delete query
          $query = "DELETE FROM " . $this->table_name . " WHERE user_id=:user_id";
          $stmt = $this->conn->prepare($query);

          // sanitize
          $this->user_id=htmlspecialchars(strip_tags($this->user_id));

          // bind id
          $stmt->bindParam(":user_id", $this->user_id);

          if($stmt->execute()){
              return true;
          }

          return false;
      }
}

?>
product_image.php

<?php
// 'product image' object
class ProductImage{

      // database connection and table name
      private $conn;
      private $table_name = "product_images";

      // object properties
      public $id;
      public $product_id;
      public $name;
      public $timestamp;

      // constructor
      public function __construct($db){
          $this->conn = $db;
      }

      // read the first product image related to a product
      function readFirst(){
        // select query
        $query = "SELECT id, product_id, name
                FROM " . $this->table_name . "
                WHERE product_id = ?
                ORDER BY id ASC
                LIMIT 0, 1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind prodcut id variable
        $stmt->bindParam(1, $this->product_id);

        // execute query
        $stmt->execute();

        // return values
        return $stmt;
      }
}
product.php

<?php
// The Product objects
class Product{

      //database connection
      private $conn;
      private $table_name="products";

      //object properties
      public $id;
      public $name;
      public $price;
      public $description;
      public $category_id;
      public $category_name;
      public $timestamp;

      //constructor
      public function __construct($db){
        $this->conn = $db;
      }

      //read all the products from the db
      function read($from_record_num, $records_per_page){

        // select all products query
        $query = "SELECT
                    id, name, description, price
                FROM
                    " . $this->table_name . "
                ORDER BY
                    created ASC
                LIMIT
                    ?, ?";

          //prepare query statement
          $stmt = $this->conn->prepare($query);

          // bind limit clause variables
          $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
          $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

          // execute query
          $stmt->execute();

          // return values
          return $stmt;
      }

      //used for pagination
      public function count(){
        // query to count all product records
        $query = "SELECT count(*) FROM " . $this->table_name;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        // get row value return array index is column 
        $rows = $stmt->fetch(PDO::FETCH_NUM);

        // return count  /total rows
        return $rows[0];
      }

      // read all product based on product ids included in the $ids variable
      public function readByIds($ids){

          $ids_arr = str_repeat('?,', count($ids) - 1) . '?';

          // query to select products
          $query = "SELECT id, name, price FROM " . $this->table_name . " WHERE id IN ({$ids_arr}) ORDER BY name";

          // prepare query statement
          $stmt = $this->conn->prepare($query);

          // execute query
          $stmt->execute($ids);

          // return values from database
          return $stmt;
      }

}
