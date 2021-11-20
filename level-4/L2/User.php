<?php
/** @noinspection PhpMultipleClassDeclarationsInspection */

class User
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function login()
    {
        return 'logging in...';
    }

    public function register()
    {
        return 'registering...';
    }

    public function logout()
    {
        return 'logging out...';
    }

    public function createPost($post_name)
    {
        return $post_name . ' created.';
    }

    public function deletePost($post_id)
    {
        return 'The post with Id ' . $post_id . ' has been deleted!';
    }

    public function createComment($comment_content, $post_id)
    {
        return $comment_content . ' added on the post with id ' . $post_id;
    }

    public function deleteComment($comment_id)
    {
        return 'The comment with Id ' . $comment_id . ' has been deleted!';
    }
}