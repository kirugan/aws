## Usage:
   
   ```php
   $aws = new Kirugan\Aws();
   $aws->s3; // create s3 object and cache it
   var_dump($aws->s3, $aws->s3); // display bool(true)
   $aws->s3(); // create new object bypass caching
   var_dump($aws->s3, $aws->s3()); // display bool(false)
   ```