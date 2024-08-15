 public function get_drop_down_data()
    {
        try {
            $data = [];
            $data['values']['purposes'] = DB::table('purposes')->where('status', 'Y')->get();
            $data['values']['activity'] = DB::table('Activity')->get();
            $data['values']['semen_usages'] = DB::table('semen_usages')->get();
            $data['values']['requirements'] = DB::table('requirements')->get();
            $data['values']['objectives'] = DB::table('objectives')->get();
            $data['values']['union_coverages'] = DB::table('union_coverages')->get();
            $data['values']['Upazilla'] = DB::table('Upazilla')->get();
            $data['values']['target_audience'] = DB::table('targetAudience')->get();
            // $data['values']['depot'] = DB::connection('sqlsrv_166')->table('Depot')->get();
            $data['values']['program'] = DB::table('program')->get();
            $data['values']['live_stock'] = DB::table('live_stock')->get();
            $data['values']['vet_doc'] = DB::table('VetDocType')->get();
            $data['values']['product_list'] = DB::select("select ProductCode,ProductName,PackSize From [192.168.100.166].SDMSMIRROR.dbo.Product Where Business='3' and Active='Y'");

            $data['status'] = 'success';
            $data['message'] = "Data Get Successfully";
            return response()->json($data, 200);
        } catch (\Exception $e) {
            $data = [];
            $data['status'] = 'error';
            $data['message'] = "Data Synchronized Unsuccessful";
            return response()->json($data, 400);
        }
    }

  public function store(Request $request)
    {
        //
        try {

            DB::table('Dealers')
                ->insert([
                    'dealer_name' => $request->dealer_name,
                    'code' => $request->code,
                    'upazilla_code' => $request->upazilla_code,
                    'union_code' => $request->union_code,
                    'deport_code' => $request->deport_code,
                    'phone_no' => $request->phone_no,
                    'longitude' => $request->longitude,
                ]);

            $data['status'] = 'success';
            $data['message'] = "Data Insert Successfully";

            return response()->json($data, 200);
        } catch (\Exception $e) {
            $data = [];
            $data['status'] = 'error';
            $data['message'] = $e->getMessage();
            return response()->json($data, 400);
        }
    }
