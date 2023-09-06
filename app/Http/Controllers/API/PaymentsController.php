<?php

namespace App\Http\Controllers\API;
use App\Models\Payments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * @OA\Get(
     *    path="/payments",
     *    operationId="index",
     *    tags={"Payments"},
     *    summary="Get list of Payments",
     *    description="Get list of payments",
     *    @OA\Parameter(name="limit", in="query", description="limit", required=false,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Parameter(name="page", in="query", description="the page number", required=false,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Parameter(name="order", in="query", description="order  accepts 'asc' or 'desc'", required=false,
     *        @OA\Schema(type="string")
     *    ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function index(Payments $payments)
    {
        return $payments;
    }

    /**
     * @OA\Post(
     *      path="/payments",
     *      operationId="store",
     *      tags={"payments"},
     *      summary="Store payments in DB",
     *      description="Store payments in DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title", "content", "status"},
     *            @OA\Property(property="title", type="string", format="string", example="Test payments Title"),
     *            @OA\Property(property="content", type="string", format="string", example="This is a description for kodementor"),
     *            @OA\Property(property="status", type="string", format="string", example="Published"),
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function store(Request $request)
    {
        $payments = Payments::Cretae([
            ...$request->validate([
                'transaction_id'=> 'required',
                'status'=> 'Pending',
            ])
        ]);
        return $payments;
    }

    /**
     * @OA\Get(
     *    path="/payments/{id}",
     *    operationId="show",
     *    tags={"paymentss"},
     *    summary="Get payments Detail",
     *    description="Get payments Detail",
     *    @OA\Parameter(name="id", in="path", description="Id of payments", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *          @OA\Property(property="status_code", type="integer", example="200"),
     *          @OA\Property(property="data",type="object")
     *           ),
     *        )
     *       )
     *  )
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/paymentss/{id}",
     *     operationId="update",
     *     tags={"paymentss"},
     *     summary="Update payments in DB",
     *     description="Update payments in DB",
     *     @OA\Parameter(name="id", in="path", description="Id of payments", required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(
     *           required={"title", "content", "status"},
     *           @OA\Property(property="title", type="string", format="string", example="Test payments Title"),
     *           @OA\Property(property="content", type="string", format="string", example="This is a description for kodementor"),
     *           @OA\Property(property="status", type="string", format="string", example="Published"),
     *        ),
     *     ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status_code", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * @OA\Delete(
     *    path="/payments/{id}",
     *    operationId="destroy",
     *    tags={"payments"},
     *    summary="Delete payments",
     *    description="Delete payments",
     *    @OA\Parameter(name="id", in="path", description="Id of payments", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *         @OA\Property(property="status_code", type="integer", example="200"),
     *         @OA\Property(property="data",type="object")
     *          ),
     *       )
     *      )
     *  )
     */
    public function destroy(string $id)
    {
        //
    }
}
