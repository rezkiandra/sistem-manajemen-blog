@extends('layouts.app')
@section('title', 'Edit Domain')
@section('header')
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 align-self-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ __('Domain') }}</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item">Data Domain</li>
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
          <h4 class="card-title mb-4">{{ __('Edit Data Domain') }}</h4>
					
          {{-- <x-error-handling /> --}}
          <x-create-form :action="route('domain.update', $domain)">
            @csrf
            @method('PUT')
            <x-input-label :label="'Domain'" :name="'domain'" :placeholder="'https://domain@example.com'" :value="$domain->domain" />
            <x-input-label :label="'Provider'" :name="'provider_id'" :type="'select'" :placeholder="'Pilih provider'" :value="$domain->provider_id" :options="$providers" :field="'name'" />
            <x-input-label :label="'Email'" :name="'email'" :type="'email'" :placeholder="'example@gmail.com'" :value="$domain->email" />
						<x-input-label :label="'New Password (opsional)'" :name="'new_password'" :type="'password'" :placeholder="'******'" />
            <x-input-label :label="'Masa Aktif'" :name="'masa_aktif'" :type="'number'" :placeholder="'30'" :value="$domain->masa_aktif" />
          </x-create-form>
        </div>
      </div>
    </div>
  </div>
@endsection
