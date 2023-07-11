<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Post\CreateAction;
use App\Actions\Api\Post\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Request\Api\Post\PostCreateRequest;
use App\Http\Request\Api\Post\PostUpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param PostCreateRequest $request
     * @param CreateAction $action
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(PostCreateRequest $request, CreateAction $action): JsonResponse
    {
        $this->authorize('create posts', Post::class);

        $post = $action->handle($request->validated());

        return PostResource::make($post)->setStatusCode(201);
    }

    /**
     * @param Post $post
     * @param PostUpdateRequest $postUpdateRequest
     * @param UpdateAction $updateAction
     * @return PostResource
     * @throws AuthorizationException
     */
    public function update(Post $post, PostUpdateRequest $postUpdateRequest, UpdateAction $updateAction): PostResource
    {
        $this->authorize('update', $post);

        $updateAction->handle($post, $postUpdateRequest->validated());

        return PostResource::make($post);

    }

    /**
     * @param Post $post
     * @return Response
     * @throws AuthorizationException
     */
    public function delete(Post $post): Response
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json()->setStatusCode(Response::HTTP_NO_CONTENT);
    }
}
