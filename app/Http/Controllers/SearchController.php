<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Properties;


class SearchController extends Controller
{

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $properties = Properties::select(
                "properties.id",
                "properties.coverphoto",
                "properties.title",
                "properties.description",
                "properties.locality",
            )
                ->where('title', 'LIKE', '%' . $request->search . "%")
                ->orwhere('description', 'LIKE', '%' . $request->search . "%")
                ->orwhere('locality', 'LIKE', '%' . $request->search . "%")
                ->orderBy('locality', 'desc')
                ->get();

            if ($properties) {
                foreach ($properties as $key => $property) {
                    $output .=
                        '<div class="pictureboxes">
                            <a href="/description/'. $property->id . '">
                                <object data="' . asset("$property->coverphoto") . '") width=100% height=100% class="proppics"></object>
                            </a>
                            <br>
                            <p class="proptext">
                                <strong>Place: </strong>' . $property->title . '
                            </p>
                            <p class="proptext">' . $property->locality . '</strong></p>
                        </div>';

                }
                return Response($output);
            }
        }
    }
}
