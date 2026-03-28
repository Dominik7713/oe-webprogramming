<?php
class Project {
    public $id;
    public $title;
    public $description;
    public $technologies;
    public $image_path;
    public $github_url;
    public $order_num;
    public $is_active;
    public $created_at;

    public function __construct($id,$title, $description, $technologies, $image_path, $github_url, $order_num, $is_active, $created_at) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->technologies = $technologies;
        $this->image_path = $image_path;
        $this->order_num = $order_num;
        $this->github_url = $github_url;
        $this->is_active = $is_active;
        $this->created_at = $created_at;
    }

    public function getTechnologiesList() {
        return explode(',', $this->technologies);
    }
}
?>

