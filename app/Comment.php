<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	const IS_ALLOW = 1;
	const IS_NOTALLOW =0;

	public function author()
	{
		return $this->belongsTo(User::class,'user_id');
    }

	public function posts()
	{
		return $this->belongsTo(Post::class);
    }

	public function allow()
	{
		$this->status = Comment::IS_ALLOW ;
		$this->save();
	}

	public function disAllow()
	{
		$this->status = Comment::IS_NOTALLOW ;
		$this->save();
	}

	public function toggleStatus()
	{
		if ($this->status == 0)
		{
			return $this->allow();
		}

		return $this->disAllow();
	}

	public function remove()
	{
		$this->delete();
	}

}
