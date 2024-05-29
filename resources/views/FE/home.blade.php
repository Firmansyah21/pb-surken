@extends('layouts.main')

@section('content')

    <!-- Start of Section: Hero -->
    @include('layouts.hero')
    <!-- End of Section: Hero -->

    <!-- Start of Section: About -->
    @include('layouts.about')
    <!-- End of Section: About -->

    <!-- Start of Section: Latest Blog -->
    @include('layouts.berita-terkini')
    <!-- End of Section: Latest Blog -->

    <!-- Start of Section: Latest Anggota -->
    @include('layouts.anggota-terkini')
    <!-- End of Section: Latest Anggota -->

    <!-- Start of Section: Latest Gallery -->
    @include('layouts.galeri-terbaru')
    <!-- End of Section: Latest Gallery -->

    <!-- Start of Section: Contact -->
    @include('layouts.kontak')
    <!-- End of Section: Contact -->



@endsection

