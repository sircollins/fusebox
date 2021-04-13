<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Panic;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Response;

class PanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // GET PANIC HISTORY

        $client  = new Client(); // Guzzle Http Client
        $url = "https://wayne.fusebox-staging.co.za/api/v1/panic/get";

        $params = [
            // parameters passed here if available
        ];
        $headers = [
            'api-key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMmUwMWU0OTk3N2JlNmU3NzYwYmZjMzcyZTU0MmZmMWU0MWYxM2YwNGE5YzdkZTJmZjBlYjZjNGEzZmM1OWIxMGFhMjkxYmNmZGVhMGUyMzQiLCJpYXQiOjE2MTc2OTU2NzQsIm5iZiI6MTYxNzY5NTY3NCwiZXhwIjoxNjQ5MjMxNjc0LCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.csyfKJr39LMSb0twr3nalNYmdIA6itAe-ebLFRigstXi1PQwAQSjsTUuEiFNcMRf6QEhdhNacsJYW7bpm8hf9uf8OoiQiIWyBmRWSgs4rLNJ0COQZqabl-oq6ZXEYEdsJ_07gl2aRpiuYtY0i20WLmZP7-pOQ3wBisk2nZjdYWrNcBKWe2mb7B2Jbkne3rUURi-5IbAxQBuk0GkgKBe7KwCug3VSNQXD-LMbpJcDXQO5t2FNP3od-qgiGJK45eOGA-gPrwdSo90WgG_BDDopgS8rnt62-YXI3Hb2bcXuah4umfsmaEIoePlxglSxYQ2Vroh7hXaXVtrBQtOKZQP6LN4DfvXdz-XvY7tG8sM2iWkIitEghoVv2DS_1rhETzMfX3pyL8R0gcNrvdouYBv0aaCKwVzydYn61t6vg7Kvq9bDIMMRyKD9VcjmKS7f1Tdq7O5b4SAHmhAw7tLRRBFGdjOJycBzBQPrDuA-crl9MMu4TDSX4-cu4jhjxwuidTohLhpDrF-R1Hm9Zcosa38fvhPsVtXspQwlAelboJjHS-GFS8OedA-Pd0BfMOW2ZlBf5h7VINGh84p3dX50NY3FSF59DxwSAmm01eW3gvb80jWxI0X461r0Ft3-17aRojSS338TnvKRjN4i6s74r7DXumSfDRKhxfkrqkm05ak2lrU

            '
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify' => 'false',

        ]);

        if($response->status() != '200' ){
            $results = $response->results(['message' => 'Unauthorized Access']);
        }
        elseif($response->status = '500'){
            // Send Notifiable Email Alert to System Admin via Mailables or Notify
        }

        $results = $response->results(['message' => 'Action Completed Succesffuly'],'data.panics');
        return $results;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CREATE A PANIC

        $client  = new Client(); // Guzzle Http Client
        $url = "https://wayne.fusebox-staging.co.za/api/v1/panic/create";

        $params = [
            'longtitude' => '28.0559616',
            'latitude' => '-26.099712',
            'panic_type' => 'Bank Robbery',
            'details' => 'The joker is holding hostages. Come quick!'

        ];
        $headers = [
            'api-key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMmUwMWU0OTk3N2JlNmU3NzYwYmZjMzcyZTU0MmZmMWU0MWYxM2YwNGE5YzdkZTJmZjBlYjZjNGEzZmM1OWIxMGFhMjkxYmNmZGVhMGUyMzQiLCJpYXQiOjE2MTc2OTU2NzQsIm5iZiI6MTYxNzY5NTY3NCwiZXhwIjoxNjQ5MjMxNjc0LCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.csyfKJr39LMSb0twr3nalNYmdIA6itAe-ebLFRigstXi1PQwAQSjsTUuEiFNcMRf6QEhdhNacsJYW7bpm8hf9uf8OoiQiIWyBmRWSgs4rLNJ0COQZqabl-oq6ZXEYEdsJ_07gl2aRpiuYtY0i20WLmZP7-pOQ3wBisk2nZjdYWrNcBKWe2mb7B2Jbkne3rUURi-5IbAxQBuk0GkgKBe7KwCug3VSNQXD-LMbpJcDXQO5t2FNP3od-qgiGJK45eOGA-gPrwdSo90WgG_BDDopgS8rnt62-YXI3Hb2bcXuah4umfsmaEIoePlxglSxYQ2Vroh7hXaXVtrBQtOKZQP6LN4DfvXdz-XvY7tG8sM2iWkIitEghoVv2DS_1rhETzMfX3pyL8R0gcNrvdouYBv0aaCKwVzydYn61t6vg7Kvq9bDIMMRyKD9VcjmKS7f1Tdq7O5b4SAHmhAw7tLRRBFGdjOJycBzBQPrDuA-crl9MMu4TDSX4-cu4jhjxwuidTohLhpDrF-R1Hm9Zcosa38fvhPsVtXspQwlAelboJjHS-GFS8OedA-Pd0BfMOW2ZlBf5h7VINGh84p3dX50NY3FSF59DxwSAmm01eW3gvb80jWxI0X461r0Ft3-17aRojSS338TnvKRjN4i6s74r7DXumSfDRKhxfkrqkm05ak2lrU

            '
        ];

        $response = $client->request('GET', $url, [
            'json' => $params,
            'headers' => $headers,
            'verify' => 'false',

        ]);

        if($response->status() != '200' ){
            $results = $response->results(['message' => 'Missing Variables OR Input']);
        }
        elseif($response->status = '500'){
            // Send Notifiable Email Alert to System Admin via Mailables or Notify
        }

        $result = $response->result(['message' => 'Panic raised successfully – Batman is on the way!'],
                                     ['data' => 'panic_id']);


        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panic  $panic
     * @return \Illuminate\Http\Response
     */
    public function show(Panic $panic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panic  $panic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panic $panic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panic  $panic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panic $panic)
    {
        // CANCEL PANIC

        $client  = new Client(); // Guzzle Http Client
        $url = "https://wayne.fusebox-staging.co.za/api/v1/panic/cancel";

        $params = [
            'id' => '8',
        ];
        $headers = [
            'api-key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMmUwMWU0OTk3N2JlNmU3NzYwYmZjMzcyZTU0MmZmMWU0MWYxM2YwNGE5YzdkZTJmZjBlYjZjNGEzZmM1OWIxMGFhMjkxYmNmZGVhMGUyMzQiLCJpYXQiOjE2MTc2OTU2NzQsIm5iZiI6MTYxNzY5NTY3NCwiZXhwIjoxNjQ5MjMxNjc0LCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.csyfKJr39LMSb0twr3nalNYmdIA6itAe-ebLFRigstXi1PQwAQSjsTUuEiFNcMRf6QEhdhNacsJYW7bpm8hf9uf8OoiQiIWyBmRWSgs4rLNJ0COQZqabl-oq6ZXEYEdsJ_07gl2aRpiuYtY0i20WLmZP7-pOQ3wBisk2nZjdYWrNcBKWe2mb7B2Jbkne3rUURi-5IbAxQBuk0GkgKBe7KwCug3VSNQXD-LMbpJcDXQO5t2FNP3od-qgiGJK45eOGA-gPrwdSo90WgG_BDDopgS8rnt62-YXI3Hb2bcXuah4umfsmaEIoePlxglSxYQ2Vroh7hXaXVtrBQtOKZQP6LN4DfvXdz-XvY7tG8sM2iWkIitEghoVv2DS_1rhETzMfX3pyL8R0gcNrvdouYBv0aaCKwVzydYn61t6vg7Kvq9bDIMMRyKD9VcjmKS7f1Tdq7O5b4SAHmhAw7tLRRBFGdjOJycBzBQPrDuA-crl9MMu4TDSX4-cu4jhjxwuidTohLhpDrF-R1Hm9Zcosa38fvhPsVtXspQwlAelboJjHS-GFS8OedA-Pd0BfMOW2ZlBf5h7VINGh84p3dX50NY3FSF59DxwSAmm01eW3gvb80jWxI0X461r0Ft3-17aRojSS338TnvKRjN4i6s74r7DXumSfDRKhxfkrqkm05ak2lrU

            '
        ];

        $response = $client->request('GET', $url, [
            'json' => $params,
            'headers' => $headers,
            'verify' => 'false',

        ]);

        if($response->status() != '200' ){
            $results = $response->results(['message' => 'Validation Failure']);
        }

        $results = $response->results(['message' => 'Panic cancelled successfully – I hope you have a good excuse for this']);
        return $results;

    }
}
