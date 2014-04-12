<?php
class MyImage extends Image {
    public function generateRotateClockwise(GD $gd) {
        return $gd->rotate(90);
    }
     
    public function generateRotateCounterClockwise(GD $gd)  {
        return $gd->rotate(270);
    }
     
    public function clearResampledImages()  {
        $files = glob(Director::baseFolder().'/'.$this->Parent()->Filename."_resampled/*-$this->Name");
        foreach($files as $file) {unlink($file);}
    }
     
    public function Landscape() {
        return $this->getWidth() > $this->getHeight();
    }
     
    public function Portrait() {
        return $this->getWidth() < $this->getHeight();
    }
     
    public function generatePaddedImageByWidth(GD $gd,$width=600,$color="fff"){
        return $gd->paddedResize($width, round($gd->getHeight()/($gd->getWidth()/$width),0),$color);
    }
     
    public function Exif(){
        //http://www.v-nessa.net/2010/08/02/using-php-to-extract-image-exif-data
        $image = $this->AbsoluteURL;
        $d=new ArrayList();
        $exif = exif_read_data($image, 0, true);
        foreach ($exif as $key => $section) {
            $a=new ArrayList();
            foreach ($section as $name => $val)
                $a->push(new ArrayData(array("Title"=>$name,"Content"=>$val)));
            $d->push(new ArrayData(array("Title"=>strtolower($key),"Content"=>$a)));
        }
        return $d;
    }
}