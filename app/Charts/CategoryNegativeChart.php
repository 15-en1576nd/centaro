<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Board;
use App\Models\BoardCategory;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class CategoryNegativeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $board = Board::find($request->id);
        $percentage = [];
        $categories = $board->categories;
        $labels = $categories->pluck('name')->toArray();
        $data = [];
        $colors = [];
        $i = 1;
        $totalrecords = 0;
        foreach ($board->categories as $category) {
            $totalrecords += $category->records->where('type', '=', '-')->sum('value');

        }
        foreach ($categories as $category) {
            $data[] = $i;
            $i++;
            ///
        }
        foreach ($board->categories as $category) {
            if($totalrecords === 0) {
                $percentage[] = 0;
            } else {
                $percentage[] = floor($category->records->where('type', '=', '-')->sum('value') / $totalrecords * 100);
            }
        }
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Categories', $percentage);
    }
}
