<?php
class Database
{
    private $hostname = '';
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
    public function getUser($email, $password = null)
    {
        $email = mysqli_real_escape_string($this->connect(), htmlspecialchars($email));

        if (!$password) {
            $password = mysqli_real_escape_string($this->connect(), htmlspecialchars($password));
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
        $name = mysqli_real_escape_string($this->connect(), $name);
        $pic = mysqli_real_escape_string($this->connect(), $pic);
        $pic_mob = mysqli_real_escape_string($this->connect(), $pic_mob);

        $rows = mysqli_query($this->connect(), "SELECT COUNT(*) FROM slides");
        $rowCount = mysqli_fetch_assoc($rows)['COUNT(*)'] + 1;

        $query = mysqli_query($this->connect(), "INSERT INTO slides(name, picture, picture_mobile, position) VALUES ('$name','$pic','$pic_mob', '$rowCount')");
        if ($rows && $query) {
            return true;
        }
        return null;
    }
    public function editSlide($id, $name, $pic, $pic_mob)
    {
        $name = mysqli_real_escape_string($this->connect(), $name);
        $pic = mysqli_real_escape_string($this->connect(), $pic);
        $pic_mob = mysqli_real_escape_string($this->connect(), $pic_mob);

        $query = mysqli_query($this->connect(), "UPDATE `slides` SET name='$name', picture='$pic', picture_mobile='$pic_mob' WHERE id=$id");
        if ($query) {
            return true;
        }
        return null;
    }
    public function deleteSlide($id)
    {
        $query = mysqli_query($this->connect(), "DELETE FROM slides WHERE id=$id");
        if ($query) {
            return true;
        }
        return null;
    }
    public function postPosititon($id, $pos, $direction, $section)
    {
        if ($direction == 'up') {
            mysqli_query($this->connect(), "UPDATE posts SET position=$pos WHERE position=$pos-1 AND section='$section'");
            mysqli_query($this->connect(), "UPDATE posts SET position=$pos-1 WHERE id=$id AND section='$section'");
        } else {
            mysqli_query($this->connect(), "UPDATE posts SET position=$pos WHERE position=$pos+1 AND section='$section'");
            mysqli_query($this->connect(), "UPDATE posts SET position=$pos+1 WHERE id=$id AND section='$section'");
        }
    }
    public function getLanguages()
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM languages");
        if ($query) {
            $result = [];
            while ($languages = mysqli_fetch_assoc($query)) {
                $result[] = $languages;
            }
            return $result;
        }
        return null;
    }
    public function getPosts($lang)
    {
        $query = mysqli_query($this->connect(), "SELECT keyword,section,link,$lang FROM posts ORDER BY position");
        if ($query) {
            $result = [];
            while ($post = mysqli_fetch_assoc($query)) {
                $html = json_decode($post[$lang], true);
                $arr = [
                    'html' => $html['html'] ?? null,
                    'icon' => $html['icon'] ?? null,
                    'icon2' => $html['icon2'] ?? null,
                    'link' => $post['link'],
                ];
                if (!empty($post['section'])) {
                    $result[$post['section']][] = $arr;
                } else {
                    $result[$post['keyword']] = $arr;
                }
            }
            return $result;
        }
        return null;
    }
    public function getSection($name, $lang)
    {
        $query = mysqli_query($this->connect(), "SELECT id,link,position,$lang FROM posts WHERE section='$name' ORDER BY position");
        if ($query) {
            $result = [];
            while ($posts = mysqli_fetch_assoc($query)) {
                $posts[$lang] = json_decode($posts[$lang], true);
                $result[] = $posts;
            }
            return $result;
        }
        return null;
    }
    public function getSections()
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM sections");
        if ($query) {
            $result = [];
            while ($posts = mysqli_fetch_assoc($query)) {
                $result[] = $posts;
            }
            return $result;
        }
        return null;
    }
    public function getPost($id)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM posts WHERE id='$id' LIMIT 1");
        if ($query) {
            return mysqli_fetch_assoc($query);
        }
        return null;
    }
    public function editPost($post, $lang, $text, $link, $icon, $icon2)
    {
        $lang = mysqli_real_escape_string($this->connect(), $lang);
        // $text = mysqli_real_escape_string($this->connect(), $text);
        $link = mysqli_real_escape_string($this->connect(), $link);

        $html = ['html' => $text, 'icon' => $icon ?? $post[$lang]['icon'], 'icon2' => $icon2 ?? $post[$lang]['icon2']];
        $html = json_encode(array_map('utf8_encode', $html));
        $query = mysqli_query($this->connect(), "UPDATE posts SET $lang='$html', link='$link', icon='$icon' WHERE id=" . $post['id']);
        if ($query) {
            return true;
        }
        return null;
    }
    public function deletePost($id)
    {
        $query = mysqli_query($this->connect(), "DELETE FROM posts WHERE id=$id");
        if ($query) {
            return true;
        }
        return null;
    }
    public function setPost($section, $lang, $text, $link, $icon, $icon2 = null)
    {
        $lang = mysqli_real_escape_string($this->connect(), $lang);
        $text = mysqli_real_escape_string($this->connect(), $text);
        $link = mysqli_real_escape_string($this->connect(), $link);

        $rows = mysqli_query($this->connect(), "SELECT COUNT(*) FROM posts WHERE section='$section'");
        $rowCount = mysqli_fetch_assoc($rows)['COUNT(*)'] + 1;

        $html = ['html' => $text, 'icon' => $icon, 'icon2' => $icon2];
        $html = json_encode($html);
        $query = mysqli_query($this->connect(), "INSERT INTO posts(section,position,link,$lang) VALUES ('$section', $rowCount, '$link', '$html')");
        if ($query) {
            return true;
        }
        return null;
    }
    public function setLanguage($name, $keyword, $status, $icon)
    {
        $name = mysqli_real_escape_string($this->connect(), $name);
        $keyword = strtolower(mysqli_real_escape_string($this->connect(), $keyword));
        $status = strtolower(mysqli_real_escape_string($this->connect(), $status));
        $icon = mysqli_real_escape_string($this->connect(), $icon);

        $query = mysqli_query($this->connect(), "INSERT INTO languages(keyword, status, name, icon) VALUES ('$keyword','$status','$name','$icon')");
        $query2 = mysqli_query($this->connect(), "ALTER TABLE posts ADD $keyword TEXT NOT NULL");
        if ($query && $query2) {
            return true;
        }
        return null;
    }
    public function editLanguage($id, $oldLang, $name, $keyword, $status, $icon)
    {
        $name = mysqli_real_escape_string($this->connect(), $name);
        $keyword = strtolower(mysqli_real_escape_string($this->connect(), $keyword));
        $status = strtolower(mysqli_real_escape_string($this->connect(), $status));
        $icon = mysqli_real_escape_string($this->connect(), $icon);

        if ($oldLang) {
            $query2 = mysqli_query($this->connect(), "ALTER TABLE posts CHANGE $oldLang $keyword TEXT NOT NULL");
            if (!$query2) {
                return false;
            }
        }
        mysqli_query($this->connect(), "UPDATE languages SET name='$name', keyword='$keyword', status='$status', icon='$icon' WHERE id=$id");
    }
    public function deleteLanguage($keyword)
    {
        $query = mysqli_query($this->connect(), "ALTER TABLE posts DROP $keyword");
        if (!$query) {
            return false;
        } else {
            mysqli_query($this->connect(), "DELETE FROM languages WHERE keyword='$keyword'");
        }
    }
    public function getLanguage($id)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM languages WHERE id=$id LIMIT 1");
        if ($query) {
            return mysqli_fetch_assoc($query);
        }
        return null;
    }
}
