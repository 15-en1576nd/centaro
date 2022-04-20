<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Icon::create(['name' => 'bank', 'svg' => '<path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="21" x2="21" y2="21" />  <line x1="3" y1="10" x2="21" y2="10" />  <polyline points="5 6 12 3 19 6" />  <line x1="4" y1="10" x2="4" y2="21" />  <line x1="20" y1="10" x2="20" y2="21" />  <line x1="8" y1="14" x2="8" y2="17" />  <line x1="12" y1="14" x2="12" y2="17" />  <line x1="16" y1="14" x2="16" y2="17" />']);
        Icon::create(['name' => 'home', 'svg' => ' <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="5 12 3 12 12 3 21 12 19 12" />  <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />  <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />']);
        Icon::create(['name' => 'computer', 'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>']);
        Icon::create(['name' => 'laptop', 'svg' => '<path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="19" x2="21" y2="19" />  <rect x="5" y="6" width="14" height="10" rx="1" />']);
        Icon::create(['name' => 'car', 'svg' => '<path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="7" cy="17" r="2" />  <circle cx="17" cy="17" r="2" />  <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />']);
        Icon::create(['name' => 'printer', 'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>']);
        Icon::create(['name' => 'camera', 'svg' => ' <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
  <circle cx="12" cy="13" r="3" />']);
        Icon::create(['name' => 'calculator', 'svg' => ' <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="4" y="3" width="16" height="18" rx="2" />  <rect x="8" y="7" width="8" height="3" rx="1" />
  <line x1="8" y1="14" x2="8" y2="14.01" />  <line x1="12" y1="14" x2="12" y2="14.01" />  <line x1="16" y1="14" x2="16" y2="14.01" />  <line x1="8" y1="17" x2="8" y2="17.01" />  <line x1="12" y1="17" x2="12" y2="17.01" />
 <line x1="16" y1="17" x2="16" y2="17.01" />']);
        Icon::create(['name' => 'lamp', 'svg' => ' <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M3 12h1M12 3v1M20 12h1M5.6 5.6l.7 .7M18.4 5.6l-.7 .7" />
  <path d="M9 16a5 5 0 1 1 6 0a3.5 3.5 0 0 0 -1 3a2 2 0 0 1 -4 0a3.5 3.5 0 0 0 -1 -3" />  <line x1="9.7" y1="17" x2="14.3" y2="17" />']);
        Icon::create(['name' => 'line-up', 'svg' => '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />  <polyline points="17 6 23 6 23 12" />']);
        Icon::create(['name' => 'line-down', 'svg' => '<path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="3 7 9 13 13 9 21 17" />
<polyline points="21 10 21 17 14 17" />']);
        Icon::create(['name' => 'tree', 'svg' => '<path stroke="none" d="M0 0h24v24H0z"/>
 <rect x="4" y="3" width="8" height="14" rx="4" />
 <rect x="12" y="7" width="8" height="10" rx="3" />
 <line x1="8" y1="21" x2="8" y2="13" />
 <line x1="16" y1="21" x2="16" y2="14" />']);
        Icon::create(['name' => 'microphone', 'svg' => ' <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>']);
        Icon::create(['name' => 'television', 'svg' => '<path stroke="none" d="M0 0h24v24H0z"/>  <rect x="3" y="7" width="18" height="13" rx="2" />  <polyline points="16 3 12 7 8 3" />']);
        Icon::create(['name' => 'apple', 'svg' => ' <path stroke="none" d="M0 0h24v24H0z"/>
  <path d="M9 7c-3 0-4 3-4 5.5 0 3 2 7.5 4 7.5 1.088-.046 1.679-.5 3-.5 1.312 0 1.5.5 3 .5s4-3 4-5c-.028-.01-2.472-.403-2.5-3-.019-2.17 2.416-2.954 2.5-3-1.023-1.492-2.951-1.963-3.5-2-1.433-.111-2.83 1-3.5 1-.68 0-1.9-1-3-1z" />
  <path d="M12 4a2 2 0 0 0 2 -2a2 2 0 0 0 -2 2" />']);
        Icon::create(['name' => 'watch', 'svg' => '<path stroke="none" d="M0 0h24v24H0z"/>  <rect x="6" y="6" width="12" height="12" rx="3" />  <path d="M9 18v3h6v-3" />  <path d="M9 6v-3h6v3" />']);
        Icon::create(['name' => 'watch', 'svg' => '<path stroke="none" d="M0 0h24v24H0z"/>  <rect x="7" y="4" width="10" height="16" rx="4" />  <line x1="12" y1="8" x2="12" y2="11" />']);
    }
}
