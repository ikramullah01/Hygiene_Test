<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        //Validate the request if the required fields exists or not.
        $this->validate(
            $request, [
                'width'  => 'required',
                'length' => 'required',
                'height' => 'required',
            ]
        );
        $width  = $request->width;
        $length = $request->length;
        $height = $request->height;
        
        /*
         *  Do the calculations based on the formula {(W*L*H)/5000}
         *  And select the correct box size
         *  Here we will randomly select a box
         */

        $available_boxes = array("20 FT Container","40 FT Container","60 FT Container");
        shuffle($available_boxes); //Randomize the array

        return response()->json(['The correct box size is' => $available_boxes[0]], 200);
    }
}
