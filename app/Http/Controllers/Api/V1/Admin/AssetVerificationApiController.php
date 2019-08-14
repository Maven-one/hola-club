<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AssetVerification;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetVerificationRequest;
use App\Http\Requests\UpdateAssetVerificationRequest;
use App\Http\Resources\Admin\AssetVerificationResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetVerificationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_verification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssetVerificationResource(AssetVerification::with(['outlet'])->get());
    }

    public function store(StoreAssetVerificationRequest $request)
    {
        $assetVerification = AssetVerification::create($request->all());
        $assetVerification->outlet()->sync($request->input('outlet', []));

        return (new AssetVerificationResource($assetVerification))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AssetVerification $assetVerification)
    {
        abort_if(Gate::denies('asset_verification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssetVerificationResource($assetVerification->load(['outlet']));
    }

    public function update(UpdateAssetVerificationRequest $request, AssetVerification $assetVerification)
    {
        $assetVerification->update($request->all());
        $assetVerification->outlet()->sync($request->input('outlet', []));

        return (new AssetVerificationResource($assetVerification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AssetVerification $assetVerification)
    {
        abort_if(Gate::denies('asset_verification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetVerification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
