<?php
interface Image {
    public function display(): void;
}

class RealImage implements Image {
    private $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
        $this->loadFromDisk();
    }

    public function display(): void {
        echo "Displaying image " . $this->filename;
        echo '<br/>';
    }

    private function loadFromDisk(): void {
        echo "Loading " . $this->filename . " from disk";
        echo '<br/>';
    }
}

class ProxyImage implements Image {
    private $filename;
    private $realImage;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function display(): void {
        if ($this->realImage == null) {
            $this->realImage = new RealImage($this->filename);
        }
        $this->realImage->display();
    }
}

$image1 = new ProxyImage("image1.png");
$image2 = new ProxyImage("image2.png");

// The following lines will only create RealImage objects if necessary
$image1->display(); // Output: Loading image1.png from disk. Displaying image image1.png
$image1->display(); // Output: Displaying image image1.png
$image2->display(); // Output: Loading image2.png from disk. Displaying image image2.png
$image2->display(); // Output: Displaying image image2.png