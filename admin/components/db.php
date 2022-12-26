<?php
class Database
{
    private $hostname = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $database = 'golden90';
    private $port = 19546;

    private function connect()
    {
        $mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ')  ' . $mysqli->connect_error);
        }
        return $mysqli;
    }

    public function getUser($email, $password)
    {
        $email = mysqli_real_escape_string($this->connect(), $email);
        $password = mysqli_real_escape_string($this->connect(), $password);

        if (!$password) {
            $query = mysqli_query($this->connect(), "SELECT * FROM `users` WHERE `email`='$email' LIMIT 1");
        } else {
            $query = mysqli_query($this->connect(), "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' LIMIT 1");
        }
        if ($query) {
            return mysqli_fetch_assoc($query);
        }
        return null;
    }
    public function getSlides()
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM `slides` ORDER BY `position`");
        if ($query) {
            $result = [];
            while ($slides = mysqli_fetch_assoc($query)) {
                $result[] = $slides;
            }
            return $result;
        }
        return null;
    }
    public function getSlide($id)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM `slides` WHERE id='$id' LIMIT 1");
        if ($query) {
            return mysqli_fetch_assoc($query);
        }
        return null;
    }
    public function setSlide($name, $pic, $pic_mob)
    {
        $query = mysqli_query($this->connect(), "INSERT INTO `slides`(`name`, `picture`, `picture_mobile`) VALUES ('$name','$pic','$pic_mob')");
        if ($query) {
            return true;
        }
        return null;
    }
    public function editSlide($id, $name, $pic, $pic_mob)
    {
        $query = mysqli_query($this->connect(), "UPDATE `slides` SET name='$name', picture='$pic', picture_mobile='$pic_mob' WHERE id='$id'");
        if ($query) {
            return true;
        }
        return null;
    }
    public function deleteSlide($id)
    {
        $query = mysqli_query($this->connect(), "DELETE FROM slides WHERE id='$id'");
        if ($query) {
            return true;
        }
        return null;
    }
    public function slideUp($id, $pos, $direction)
    {
        // $time = time();
        if ($direction == 'up') {
            $query = mysqli_query($this->connect(), "UPDATE slides SET position=$pos WHERE position=$pos-1");
            $query = mysqli_query($this->connect(), "UPDATE slides SET position=$pos-1 WHERE id=$id");
        } else {
            $query = mysqli_query($this->connect(), "UPDATE slides SET position=$pos WHERE position=$pos+1");
            $query = mysqli_query($this->connect(), "UPDATE slides SET position=$pos+1 WHERE id=$id");
        }
    }
    public function getLanguages()
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM `languages`");
        if ($query) {
            $result = [];
            while ($languages = mysqli_fetch_assoc($query)) {
                $result[] = $languages;
            }
            return $result;
        }
        return null;
    }
    public function getPosts($lang, $indexed)
    {
        $query = mysqli_query($this->connect(), "SELECT id,keyword,link,icon,$lang FROM posts");
        if ($query) {
            if ($indexed) {
                $result = [];
                while ($posts = mysqli_fetch_assoc($query)) {
                    $result[] = $posts;
                }
                return $result;
            } else {
                $result = [];
                while ($posts = mysqli_fetch_assoc($query)) {
                    $arr = [
                        'text' => $posts[$lang],
                        'link' => $posts['link'],
                        'icon' => $posts['icon']
                    ];
                    $result[$posts['keyword']] = $arr;
                }
                return $result;
            }
        }
        return null;
    }
}
