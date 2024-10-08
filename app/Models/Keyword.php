<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keyword extends Model
{
	use HasFactory, HasUlids;

	protected $keyType = 'string';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'slug',
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (!$model->getKey()) {
				$model->setAttribute($model->getKeyName(), Str::ulid());
			}
		});
	}

	public function blog()
	{
		return $this->belongsTo(Blog::class);
	}
}
