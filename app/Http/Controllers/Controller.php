<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    /**
     * @SWG\Swagger(
     *     schemes={"http"},
     *     basePath="/api",
     *     @SWG\Info(
     *         version="0.0.1",
     *         title="Anthill Connect API",
     *         description="APi provides gamification tools",
     *         termsOfService="",
     *         @SWG\Contact(
     *             url="gdforge.ru"
     *         ),
     *         @SWG\License(
     *             name="Private License",
     *             url="URL to the license"
     *         )
     *     ),
     *     @SWG\ExternalDocumentation(
     *         description="AnthillConnect project docs",
     *         url="google.com"
     *     )
     * )
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
