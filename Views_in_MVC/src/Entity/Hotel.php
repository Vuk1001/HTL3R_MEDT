<?php
namespace Nicki\ViewsInMvc\Entity\Hotel;
class Hotel {
    public string $name;
    public string $description;
    public string $rating;
    public string $image;

    public function __construct(string $name, string $description, string $rating, string $image) {
        $this->name = $name;
        $this->description = $description;
        $this->rating = $rating;
        $this->image = $image;
    }

}
?>
