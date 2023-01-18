<?php
    require_once "Database.php";
    
    class User extends Database{
        // The logic of our app will place here


        //This is for the register
        public function store($request){
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $password = $request['password'];

            # Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `password`) VALUES('$first_name', '$last_name', '$username', '$password')";

            if ($this->conn->query($sql)) {
                header("location: ../views"); // go to index.php
                exit;
            }else {
                die("Error creating user. " . $this->conn->error);
            }
        }

        # This is for the login
        public function login($request)
        {
            $username = $request['username'];
            $password = $request['password'];

            $sql = "SELECT * FROM users WHERE username='$username'";

            $result = $this->conn->query($sql);

            # Check if the username is available
            if ($result->num_rows == 1) {
                # Check the password
                $user = $result->fetch_assoc(); //it will return an array result
                #user = ['id' => 1, 'username' => 'john', 'password' => 'john123456'];

                if (password_verify($password, $user['password'])) {
                    # session variables
                    session_start();
                    $_SESSION['id'] = $user['id']; // 1
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['first_name'] . "" . $user['last_name'];

                    header("location: ../views/dashboard.php");
                    exit;
                }else {
                    echo "Password is incorrect.";
                }
            }else {
                echo "The username not found.";
            }
        }

        public function logout()
        {
            session_start();
            session_unset();
            session_destroy();

            header("location: ../views");
            exit;
        }

        public function getAllUsers()
        {
            $sql = "SELECT id, first_name, last_name, username, photo FROM users";
            if ($result = $this->conn->query($sql)) {
                return $result;
            }else {
                die("Error retrieving users." . $this->conn->error);
            }
        }

        public function getUser()
        {
            //session_start();
            $id = $_SESSION['id'];

            $sql = "SELECT first_name, last_name, username, photo FROM users WHERE id='$id'";

            if ($result = $this->conn->query($sql)) {
                return $result->fetch_assoc();
            }else {
                die("Error in retrieving the user details." . $this->conn->error);
            }
        }

        public function update($request, $files)
        {
            session_start();
            $id = $_SESSION['id'];
            $first_name = $request['first_name'];
            $last_name  = $request['last_name'];
            $username   = $request['username'];
            $photo      = $files['photo']['name'];
            $tmp_photo  = $files['photo']['tmp_name'];

            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username='$username' WHERE id='$id'";

            if ($this->conn->query($sql)) {
                $_SESSION['username'] = $username;
                $_SESSION['fullname'] = "$first_name $last_name";

                # Check if there is an uploaded image, if there is an image
                # then, save to the database and move the file to the "assets/images"
                if ($photo) {
                    $sql = "UPDATE users SET photo = '$photo' WHERE id='$id'";
                    $destination = "../assets/images/$photo";

                    if ($this->conn->query($sql)) {
                        # Move the image received into the destination folder
                        if (move_uploaded_file($tmp_photo, $destination)) {
                            header("location: ../views/dashboard.php");
                            exit;
                        }else {
                            echo "Error moving the photo.";
                            //die("Error moving the photo". $this->conn->error);
                        } 
                    }else {
                        echo "Error in uploading photo.";
                    }
                }
                header("location: ../views/dashboard.php");
                exit;
            }else {
                die("Error in updating the user details." . $this->conn->error); // Error: 0 if there is no error, or 1 if there is error
            }
        }

        public function delete()
        {
            session_start();
            $id = $_SESSION['id'];

            # query string
            $sql = "DELETE FROM users WHERE id='$id'";
            if ($this->conn->query($sql)) {
                $this->logout();
            }else {
                die("Error in deleting the user. " . $this->conn->error);
            }
        }
    }

?>