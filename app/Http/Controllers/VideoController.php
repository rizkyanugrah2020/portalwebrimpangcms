<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Organisasi;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view('video/index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('video/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $videoRequest)
    {
        $foto = 'default.png';
        $video = 'default.png';
        if($videoRequest->hasFile('gambar')) {
            $filenameWithExt = $videoRequest->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $videoRequest->file('gambar')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $videoRequest->file('gambar')->storeAs('public/video', $foto);
        }
        if($videoRequest->hasFile('video')) {
            $filenameWithExt = $videoRequest->file('video')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $videoRequest->file('video')->getClientOriginalExtension();
            $video = $filename.'_'.time(). '.'.$extension;
            $videoRequest->file('video')->storeAs('public/video/file', $video);
        }
        $organisasi = Organisasi::find($videoRequest->organisasi_id);
        $video = $organisasi->video()->create($this->videoData($foto, $video));

        return redirect('/video/' . $video->video_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data video sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('video/show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $organisasi = Organisasi::all();
        return view('video/edit', compact('video', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $videoRequest, Video $video)
    {
        $foto = $video->gambar;
        $videoUrl = $video->url;
        if($videoRequest->hasFile('gambar')) {
            if($video->gambar != 'default.png') {
                Storage::delete("public/video/". $video->gambar);
            }
            $filenameWithExt = $videoRequest->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $videoRequest->file('gambar')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $videoRequest->file('gambar')->storeAs('public/video', $foto);
        }

        if($videoRequest->hasFile('video')) {
            if($video->url != 'default.png') {
                Storage::delete("public/video/file/". $video->url);
            }
            
            $filenameWithExt = $videoRequest->file('video')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $videoRequest->file('video')->getClientOriginalExtension();
            $videoUrl = $filename.'_'.time(). '.'.$extension;
            $videoRequest->file('video')->storeAs('public/video/file', $videoUrl);
        }
        $video->update($this->videoData($foto, $videoUrl));

        return redirect('/video/' . $video->video_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data video sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        if($video->gambar != 'default.png') {
            Storage::delete("public/video/". $video->gambar);
        }
        if($video->url != 'default.png') {
            Storage::delete("public/video/file/". $video->url);
        }
        $video->delete();

        return redirect('/video')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data video sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function videoData($foto = null, $video = null) {
        return [
            "nama_video" => request("nama_video"),
            "gambar" => $foto != null ? $foto : request("gambar"),
            "url" => $video != null ? $video : request("url"),
            "status" => request("status"),
        ];
    }
}
