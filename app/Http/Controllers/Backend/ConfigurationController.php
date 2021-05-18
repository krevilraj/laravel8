<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class ConfigurationController extends Controller
{
    public function index()
    {

        return view('admin.settings.index');
    }

    public function update(Request $request)
    {

        $inputs = $request->all();



        foreach ($inputs as $inputKey => $inputValue) {




            if ($inputKey == 'logo'||$inputKey == 'ad1'||$inputKey == 'ad2') {
                $file = $inputValue;
                // Delete old file
                $this->deleteFile($inputKey);
                // Upload file & get store file name
                $fileName = $this->uploadFile($file);
                $inputValue = $fileName;
            }


//
//            if ($inputKey == 'products_section_1' || $inputKey == 'products_section_2' || $inputKey == 'products_section_3' || $inputKey == 'products_section_4') {
//                $inputValue = json_encode($inputValue);
//            }
//
            Configuration::updateOrCreate(['configuration_key' => $inputKey], ['configuration_value' => $inputValue]);
        }


        return redirect()->back()->with('success', 'Settings successfully updated!!');
    }

    protected function uploadFile($file)
    {
        // Store file
        $path = Storage::put('settings', $file, 'public');

        // File name
        return $path;
    }

    protected function deleteFile($inputKey)
    {
        $configuration = Configuration::where('configuration_key', '=', $inputKey)->first();
        // Check if configuration exists
        if (null !== $configuration && $configuration->exists()) {
            $fullPath = storage_path('app/public') . '/' . $configuration->configuration_value;
            if (File::exists($fullPath)) {
                // File exists
                File::delete($fullPath);
            }
        }
    }
}
