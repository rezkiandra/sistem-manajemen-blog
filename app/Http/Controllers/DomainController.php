<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Domain;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
	public function index()
	{
		$domains = Domain::all();
		return view('domain.index', compact('domains'));
	}

	public function create()
	{
		$providers = Provider::get(['id', 'name']);
		return view('domain.create', compact('providers'));
	}

	public function store(Request $request)
	{
		// dd($request->all());
		try {
			$validated = Validator::make($request->all(), [
				'domain' => 'required|url|unique:domains,domain|max:100',
				'provider_id' => 'required|in:' . implode(',', Provider::pluck('id')->toArray()),
				'email' => 'required|email|unique:domains,email|max:100',
				'password' => 'required',
				'masa_aktif' => 'required|integer|min:1',
			], [
				'required' => ':attribute harus diisi',
				'url' => ':attribute harus valid',
				'unique' => ':attribute sudah ada',
				'max' => ':attribute maksimal :max karakter',
				'email' => ':attribute harus valid',
				'integer' => ':attribute harus angka',
				'min' => ':attribute minimal harus :min',
				'in' => ':attribute tidak valid',
			], [
				'domain' => 'Domain',
				'provider_id' => 'Provider',
				'email' => 'Email',
				'password' => 'Password',
				'masa_aktif' => 'Masa aktif',
			]);

			if ($validated->fails()) {
				return back()->withErrors($validated)->withInput();
			}

			$domain = new Domain();
			$domain->domain = $request->domain;
			$domain->provider_id = $request->provider_id;
			$domain->email = $request->email;
			$domain->password = $request->password;
			$domain->masa_aktif = $request->masa_aktif;
			$domain->expired_at = Carbon::now()->addDay((int)$request->masa_aktif);

			$domain->save();
			return redirect()->route('domain.index')->with('success', 'Data domain berhasil ditambahkan');
		} catch (Exception $e) {
			return back()->withErrors($e->getMessage())->withInput();
		}
	}

	public function show(string $id)
	{
		try {
			$domain = Domain::findOrFail($id);
			return view('domain.show', compact('domain'));
		} catch (Exception $e) {
			return back()->withErrors($e->getMessage());
		}
	}

	public function edit(string $id)
	{
		try {
			$domain = Domain::findOrFail($id);
			$providers = Provider::get(['id', 'name']);
			return view('domain.edit', compact('domain', 'providers'));
		} catch (Exception $e) {
			return back()->withErrors($e->getMessage());
		}
	}

	public function update(Request $request, string $id)
	{
		try {
			$validated = Validator::make($request->all(), [
				'domain' => 'required|url|max:100|unique:domains,domain,' . $id,
				'provider_id' => 'required|in:' . implode(',', Provider::pluck('id')->toArray()),
				'email' => 'required|email|max:100|unique:domains,email,' . $id,
				'masa_aktif' => 'required|integer|min:1',
			], [
				'required' => ':attribute harus diisi',
				'url' => ':attribute harus valid',
				'unique' => ':attribute sudah ada',
				'max' => ':attribute maksimal :max karakter',
				'email' => ':attribute harus valid',
				'integer' => ':attribute harus angka',
				'min' => ':attribute minimal harus :min',
				'in' => ':attribute tidak valid',
			], [
				'domain' => 'Domain',
				'provider_id' => 'Provider',
				'email' => 'Email',
				'password' => 'Password',
				'masa_aktif' => 'Masa Aktif'
			]);

			if ($validated->fails()) {
				return back()->withErrors($validated)->withInput();
			}

			$domain = Domain::findOrFail($id);
			$domain->domain = $request->domain;
			$domain->provider_id = $request->provider_id;
			$domain->email = $request->email;
			$domain->masa_aktif = $request->masa_aktif;
			$domain->expired_at = Carbon::now()->addDay((int)$request->masa_aktif);

			if ($request->new_password) {
				$domain->password = $request->new_password;
			}

			$domain->update();
			return redirect()->route('domain.index')->with('success', 'Data domain berhasil diupdate');
		} catch (Exception $e) {
			return back()->withErrors($e->getMessage())->withInput();
		}
	}

	public function destroy(string $id)
	{
		try {
			$domain = Domain::findOrFail($id);
			$domain->delete();
			return redirect()->route('domain.index')->with('success', 'Data domain berhasil dihapus');
		} catch (Exception $e) {
			return back()->withErrors($e->getMessage());
		}
	}
}
