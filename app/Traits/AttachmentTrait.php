<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Image;

use App\Models\Attachment;
use Illuminate\Http\UploadedFile;

Trait AttachmentTrait {

    private function resize( $file, $path, Array $size, $name ) {
        $store = $file->storeAs("public", $name);

        $pathToImage = storage_path("app/".$store);

        $img = Image::make($pathToImage);
        $img->resize( $size[0], $size[1], function($constraint) {
            $constraint->aspectRatio();
        });

        $img->stream();

        $img->save($pathToImage);
    }

    public function upload( Request $request, $filename, $resize = true, $index = 0 ) {

        $ret = NULL;

        if( $request->hasFile($filename) ) {

            if( is_array($request->file($filename)) && count($request->file($filename)) > 0 ) {
                $file = $request->file($filename)[$index];
            } else {
                $file = $request->file($filename);
            }
            $nm = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $mime = $file->getMimeType();
            $path = NULL;
            
            $name = uniqid(time() . "_");
            $slug = Str::slug($name);
            $thumb = $name . "_thumb". "." . $extension ;
            $medium = $name . "_medium". "." . $extension;
            $large = $name . "_large". "." . $extension;

            $_file_name = "storage/" . $name . "." . $extension;

            $store = $file->storeAs("public", $name . "." . $extension);
            $path = $store;

            $storeThumb = NULL;
            $storeMedium = NULL;
            $storeLarge = NULL;

            if(substr($mime, 0, 5) == 'image' && $resize) {
                $storeThumb = $this->resize( $file, $path, [300,300], $thumb);
                $storeMedium = $this->resize( $file, $path, [600,600], $medium);
                $storeLarge = $this->resize( $file, $path, [1024,1024], $large);
            }

            $ret = Attachment::create([
                'name' => $nm,
                'slug' => $slug,
                'filename' => $name,
                'url' => $_file_name,
                'extension' => $extension,
                'mime' => $mime
            ]);
        }

        return $ret;
    }

    public function uploadMany( Request $request, $filename, $resize = true ) {
        $ret = [];
        $count = is_array( $request->$filename ) ? count($request->$filename) > 0 : $request->filename != NULL;
        if($count) {
            foreach ($request->$filename as $key => $value) {
                for ($i=0; $i <= count($value)-1; $i++) { 
                    $file = $request->$filename[$key][$i];
                    $nm = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $mime = $file->getMimeType();
                    $path = NULL;
    
                    $name = uniqid(time() . "_");
                    $slug = Str::slug($name);
                    $thumb = $name . "_thumb". "." . $extension ;
                    $medium = $name . "_medium". "." . $extension;
                    $large = $name . "_large". "." . $extension;
    
                    $store = $file->storeAs("uploads", $name . "." . $extension);
                    $path = $store;
    
                    $storeThumb = NULL;
                    $storeMedium = NULL;
                    $storeLarge = NULL;
    
                    if(substr($mime, 0, 5) == 'image' && $resize) {
                        $storeThumb = $this->resize( $file, $path, [300,300], $thumb);
                        $storeMedium = $this->resize( $file, $path, [600,600], $medium);
                        $storeLarge = $this->resize( $file, $path, [1024,1024], $large);
                    }
    
                    $ret[] = Attachment::create([
                        'name' => $nm,
                        'slug' => $slug,
                        'filename' => $name,
                        'url' => $path,
                        'extension' => $extension,
                        'mime' => $mime
                    ])->id;
                }
            }
        }

        return $ret;
    }

    public function uploadManyIndexed( Request $request, $filename, $index, $resize = true ) {
        $ret = [];
        $count = sizeof($request->file($filename));
        if($count > 0 ) {
            foreach( $request->file($filename)[$index] as $i => $file ) {
                //dd($file);
                $nm = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $mime = $file->getMimeType();
                $path = NULL;

                $name = uniqid(time() . "_");
                $slug = Str::slug($name);
                $thumb = $name . "_thumb". "." . $extension ;
                $medium = $name . "_medium". "." . $extension;
                $large = $name . "_large". "." . $extension;

                $_file_name = "storage/" . $name . "." . $extension;

                $store = $file->storeAs("public", $name . "." . $extension);
                $path = $store;

                $storeThumb = NULL;
                $storeMedium = NULL;
                $storeLarge = NULL;

                if(substr($mime, 0, 5) == 'image' && $resize) {
                    $storeThumb = $this->resize( $file, $path, [300,300], $thumb);
                    $storeMedium = $this->resize( $file, $path, [600,600], $medium);
                    $storeLarge = $this->resize( $file, $path, [1024,1024], $large);
                }

                $attachment = Attachment::create([
                    'name' => $nm,
                    'slug' => $slug,
                    'filename' => $name,
                    'url' => $_file_name,
                    'extension' => $extension,
                    'mime' => $mime
                ]);

                $ret[] = $attachment->id;
            }
        }

        return implode(",", $ret);
    }

    public function uploadSingular( Request $request, $filename, $resize = true ) {
        $ret = NULL;

        if( $request->hasFile($filename) ) {

            $file = $request->file($filename);
            $nm = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $mime = $file->getMimeType();
            $path = NULL;
            
            $name = uniqid(time() . "_");
            $slug = Str::slug($name);
            $thumb = $name . "_thumb". "." . $extension ;
            $medium = $name . "_medium". "." . $extension;
            $large = $name . "_large". "." . $extension;

            $_file_name = "storage/" . $name . "." . $extension;

            $store = $file->storeAs("public", $name . "." . $extension);
            $path = $store;

            $storeThumb = NULL;
            $storeMedium = NULL;
            $storeLarge = NULL;

            if(substr($mime, 0, 5) == 'image' && $resize) {
                $storeThumb = $this->resize( $file, $path, [300,300], $thumb);
                $storeMedium = $this->resize( $file, $path, [600,600], $medium);
                $storeLarge = $this->resize( $file, $path, [1024,1024], $large);
            }

            /*$ret = Attachment::create([
                'name' => $nm,
                'slug' => $slug,
                'filename' => $name,
                'url' => $_file_name,
                'extension' => $extension,
                'mime' => $mime
            ]);*/

            $ret = true;
        }

        return $ret;
    }

    function uploadFromUrl( $url, $resize = true ) {
        $info = pathinfo($url);
        $contents = file_get_contents($url);
        $file = '/tmp/' . $info['basename'];
        file_put_contents($file, $contents);
        $uploaded_file = new UploadedFile($file, $info['basename']);

        $nm = $uploaded_file->getClientOriginalName();
        $extension = $uploaded_file->guessExtension();
        $mime = $uploaded_file->getMimeType();

        $name = uniqid(time() . "_");
        $slug = Str::slug($name);
        $thumb = $name . "_thumb". "." . $extension ;
        $medium = $name . "_medium". "." . $extension;
        $large = $name . "_large". "." . $extension;

        $_file_name = "storage/" . $name . "." . $extension;

        $store = $uploaded_file->storeAs("public", $name . "." . $extension);
        $path = $store;

        $storeThumb = NULL;
        $storeMedium = NULL;
        $storeLarge = NULL;

        if(substr($mime, 0, 5) == 'image' && $resize) {
            $storeThumb = $this->resize( $uploaded_file, $path, [300,300], $thumb);
            $storeMedium = $this->resize( $uploaded_file, $path, [600,600], $medium);
            $storeLarge = $this->resize( $uploaded_file, $path, [1024,1024], $large);
        }

        $ret = Attachment::create([
            'name' => $nm,
            'slug' => $slug,
            'filename' => $name,
            'url' => $_file_name,
            'extension' => $extension,
            'mime' => $mime
        ]);

        return $ret;
    }
}