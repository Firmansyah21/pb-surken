<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\SectionHero;
use App\Models\SectionAbout;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexHero()
    {
        $hero = SectionHero::first();
        $about = SectionAbout::first();
        $footer = Footer::first();
        return view('dinamis-fe.Hero.index', compact('hero', 'about', 'footer'));
    }

    public function createHero()
    {
        return view('hero.create');
    }

    public function storeHero(Request $request)
    {

        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable|file|max:6048|mimes:jpeg,png,jpg,webp',
        ]);


        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('Hero-img'), $imageName);

        SectionHero::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        return redirect()->route('home-edit')->with('success', 'Hero created successfully.');
    }

    public function editHero($id)
    {
        $hero = SectionHero::find($id);
        return view('hero.edit', compact('hero'));
    }

    public function updateHero(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable | file | max:6048 | mimes:jpeg,png,jpg,webp',
        ]);

        $hero = SectionHero::find($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Hero-img'), $imageName);
            $hero->update([
                'title' => $request->title,
                'image' => $imageName,
            ]);
        } else {
            $hero->update([
                'title' => $request->title,
            ]);
        }

        return redirect()->route('home-edit')->with('success', 'Hero updated successfully.');
    }


    public function indexAbout()
    {
        $about = SectionAbout::first();
        return view('dinamis-fe.About.index', compact('about'));
    }

    public function createAbout()
    {
        return view('about.create');
    }

    public function storeAbout(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable | file | max:6048 | mimes:jpeg,png,jpg,webp',
            'description' => 'nullable',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'sejarah' => 'nullable',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('About-img'), $imageName);


        SectionAbout::create([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'sejarah' => $request->sejarah,
        ]);

        return redirect()->route('home-edit')->with('success', 'About created successfully.');
    }

    public function editAbout($id)
    {
        $about = SectionAbout::find($id);
        return view('about.edit', compact('about'));
    }

    public function updateAbout(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable | file | max:6048 | mimes:jpeg,png,jpg,webp',
            'description' => 'nullable',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'sejarah' => 'nullable',
        ]);

        $about = SectionAbout::find($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('About-img'), $imageName);
            $about->update([
                'title' => $request->title,
                'image' => $imageName,
                'description' => $request->description,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'sejarah' => $request->sejarah,
            ]);
        } else {
            $about->update([
                'title' => $request->title,
                'description' => $request->description,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'sejarah' => $request->sejarah,
            ]);
        }

        return redirect()->route('home-edit')->with('success', 'About updated successfully.');
    }


    public function indexFooter()
    {
        $footer = Footer::first();
        return view('dinamis-fe.Footer.index', compact('footer'));
    }

    public function createFooter()
    {
        return view('footer.create');
    }

    public function storeFooter(Request $request)
    {
        $request->validate([
            'link_ig' => 'nullable',
            'link_fb' => 'nullable',
            'link_yt' => 'nullable',
            'link_tw' => 'nullable',
            'link_wa' => 'nullable',
        ]);

        Footer::create([
            'link_ig' => $request->link_ig,
            'link_fb' => $request->link_fb,
            'link_yt' => $request->link_yt,
            'link_tw' => $request->link_tw,
            'link_wa' => $request->link_wa,
        ]);

        return redirect()->route('home-edit')->with('success', 'Footer Berhasil Ditambahkan');
    }

    public function editFooter($id)
    {
        $footer = Footer::find($id);
        return view('footer.edit', compact('footer'));
    }


    public function updateFooter(Request $request, $id)
    {
        $request->validate([
            'link_ig' => 'nullable',
            'link_fb' => 'nullable',
            'link_yt' => 'nullable',
            'link_tw' => 'nullable',
            'link_wa' => 'nullable',
        ]);

        $footer = Footer::find($id);

        $footer->update([
            'link_ig' => $request->link_ig,
            'link_fb' => $request->link_fb,
            'link_yt' => $request->link_yt,
            'link_tw' => $request->link_tw,
            'link_wa' => $request->link_wa,
        ]);

        return redirect()->route('home-edit')->with('success', 'Footer Berhasil Diupdate');
    }
}
