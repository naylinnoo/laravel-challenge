<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReactionRequest;
use App\Http\Resources\PostResource;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PostResource::collection(Post::all());
    }

    public function toggleReaction(ReactionRequest $request)
    {
        $request->validated();

        if (Post::ownPost($request->post_id)->first()) {
            return response()->json([
                'status' => 500,
                'message' => 'You cannot like your post'
            ]);
        }

        $like = Like::firstOrNew([
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
        ]);

        if ($request->like === true) {

            if (!$like->exists()) {
                $like->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'You like this post successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'You already liked this post'
                ]);
            }
        } else {
            if ($like->exists()) {
                $like->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'You unliked this post successfully'
                ]);
            }
            return response()->json([
                'status' => 200,
                'message' => 'This post is already unliked'
            ]);
        }
    }
}
