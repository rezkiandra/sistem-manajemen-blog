@extends('layouts.app')
@section('title', 'Edit Blog')
@section('header')
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ __('Blog') }}</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item">Data Blog</li>
              <li class="breadcrumb-item text-muted active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">{{ __('Edit Data Blog') }}</h4>
					
          {{-- <x-error-handling /> --}}
          <x-create-form :action="route('blog.update', $blog)">
            @csrf
            @method('PUT')
            <x-input-label :label="'Domain'" :name="'domain'" :placeholder="'https://domain@example.com'" :value="$blog->domain" :col="'6'" />
            <x-input-label :label="'IP Address'" :name="'ip'" :placeholder="'192.168.0.**'" :value="$blog->ip" :col="'6'" />
            <x-input-label :label="'Provider'" :name="'provider_id'" :type="'select'" :placeholder="'Pilih provider'" :value="$blog->provider_id" :options="$providers" :col="'6'" :field="'name'" />
            <x-input-label :label="'Traffic Pengunjung'" :name="'traffic_views'" :type="'number'" :placeholder="'Masukkan angka'" :value="$blog->traffic_views" :min="1" :col="'6'" />
            <x-input-label :label="'Domain Authority'" :name="'domain_authority'" :type="'number'" :placeholder="'Masukkan angka'" :value="$blog->domain_authority" :min="1" :col="'6'"  />
            <x-input-label :label="'Domain Rating'" :name="'domain_rating'" :type="'number'" :placeholder="'Masukkan angka'" :value="$blog->domain_rating" :min="1" :col="'6'" />
						<x-input-label :label="'Status'" :name="'status'" :type="'select'" :placeholder="'Pilih status'" :value="$blog->status" :options="$status" :col="'6'" />
            <x-input-label :label="'Topic'" :name="'topic_id'" :type="'select'" :placeholder="'Pilih topic'" :value="$blog->topic_id" :options="$topics" :col="'6'" :field="'name'" />
						<x-input-label :label="'Bahasa'" :name="'lang'" :type="'select'" :placeholder="'Pilih bahasa'" :value="$blog->lang" :options="$languages" :col="'6'" />
						<x-input-label :label="'PIC'" :name="'pic'" :placeholder="'John Doe'" :value="$blog->pic" :col="'6'" />
          </x-create-form>
        </div>
      </div>
    </div>
  </div>
@endsection
