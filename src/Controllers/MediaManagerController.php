<?php

namespace Gmlo\CMS\Controllers;

use App\Http\Controllers\Controller;

use Gmlo\CMS\Modules\Assets\AssetsRepo;
use Illuminate\Http\Request;

class MediaManagerController extends Controller {

    /**
     * @var AssetsRepo
     */
    private $assetsRepo;

    public function __construct(AssetsRepo $assetsRepo) {
        $this->middleware('CMSAuthenticate');
        $this->assetsRepo = $assetsRepo;
    }

    public function index()
    {
        return view('CMS::components.media_manager.index');
    }

    public function finder(Request $request)
    {
        return $this->getAssets($request->get('finder'));
    }

    public function getAssets($finder = null)
    {
        $assets = [];
        if($finder != null)
        {
            $assets = $this->assetsRepo->finder($finder);
        }
        else
        {
            $assets = $this->assetsRepo->all();
        }

        $result = [];

        foreach ($assets as $asset)
        {
            $result[] = [
                'thumbnail'     => asset($asset->path),
                'name'          => $asset->name,
                'is_image'      => $asset->is_image,
                'extension'     => $asset->extension,
                'id'            => $asset->id,
                'tags'          => $asset->tags,
                'path'          => asset($asset->path)
            ];
        }

        return $result;
    }

    protected function getGenericType($asset)
    {
        if( starts_with($asset->type, 'image') )
        {
            return 'image';
        }

        $type = explode('/', $asset->type);

        return $type[1];
    }

    public function update(Request $request)
    {
        $data = $request->only(['name', 'tags']);
        $asset = $this->assetsRepo->findOrFail($request->get('id'));
        $this->assetsRepo->update($asset, $data);

    }

    public function destroy(Request $request)
    {
        $asset = $this->assetsRepo->findOrFail($request->get('id'));
        $this->assetsRepo->delete($asset);
        return $this->getAssets();
    }

    public function upload(Request $request)
    {
        if(! $request->hasFile('file'))
        {
            return null;
        }

        $files          = $request->file('file');
        $directory_name = \Config::get('cms.default_path');
        $directory      = public_path( $directory_name );

        foreach($files as $file)
        {
            if($file->isValid())
            {
                // Check if the directory exists, if not then create it
                if( !file_exists($directory) )
                {
                    mkdir($directory);
                }

                $name = explode('.', $file->getClientOriginalName());
                array_pop($name);
                $name = implode($name);

                $file_name = $name . '_' . time() . '.' . $file->getClientOriginalExtension();

                $file->move($directory_name, $file_name);



                $data = [
                    'name'      => $name,
                    'path'      => $directory_name . '/' . $file_name,
                    'extension' => strtolower($file->getClientOriginalExtension()),
                    'is_image'  => $this->assetsRepo->isImage($file->getClientOriginalExtension()),
                ];

                $this->assetsRepo->storeNew($data);

            }
        }
    }
}