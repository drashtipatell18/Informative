<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoSlider;

class VideoSliderController extends Controller
{
    public function VideoSlider()
    {
        $videosliders = VideoSlider::all();
        return view('videoslider.view_videoslider', compact('videosliders'));
    }

    public function VideoSliderCreate()
    {
        return view('videoslider.create_videoslider');
    }

    public function VideoSliderStore(Request $request)
    {
        $videoName = null;
        if($request->hasFile('video'))
        {
            $file = $request->file('video');
            $videoName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('video/videoslider'), $videoName);
        }

        VideoSlider::create([
            'name' => $request->input('name'),
            'video' => $videoName
        ]);

        return redirect()->route('videoslider')->with('success', 'VideoSlider created successfully.');

    }

    public function VideoSliderEdit($id)
    {
        $videoslider = VideoSlider::findOrFail($id);
        return view('videoslider.create_videoslider',compact('videoslider'));
    }

    public function VideoSliderUpdate(Request $request)
    {
        $videoslider = VideoSlider::findOrFail($request->id);

        // Handle video replacement if a new file is uploaded
        if ($request->hasFile('video')) {
            // Delete the old video if exists
            if ($videoslider->video) {
                $oldVideoPath = public_path('video/videoslider/' . $videoslider->video);
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }

            // Save new video with better naming convention
            $file = $request->file('video');
            $videoName = 'video_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Ensure directory exists
            $uploadPath = public_path('video/videoslider');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $videoName);
            $videoslider->video = $videoName;
        }
        // If no new video is uploaded, keep the old one (from hidden field or existing record)
        elseif ($request->input('old_video')) {
            $videoslider->video = $request->input('old_video');
        }

        $videoslider->name = $request->input('name');
        $videoslider->save();

        return redirect()->route('videoslider')->with('success', 'VideoSlider updated successfully.');
    }


    public function VideoSliderDestroy($id)
    {
        $videoslider = VideoSlider::findOrFail($id);

        // Delete video file from storage
        $videoPath = public_path('video/videoslider/' . $videoslider->video);
        if (file_exists($videoPath)) {
            unlink($videoPath);
        }

        // Delete record from database
        $videoslider->delete();

        return redirect()->route('videoslider')->with('success', 'VideoSlider deleted successfully.');
    }
}
