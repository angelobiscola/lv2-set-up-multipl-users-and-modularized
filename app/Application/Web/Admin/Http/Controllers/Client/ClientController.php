<?php
namespace App\Application\Web\Admin\Http\Controllers\Client;

use App\Application\Web\Admin\Http\Controllers\BaseController;
use App\Domains\Admin\Client;
use Illuminate\Http\Request;

class ClientController extends BaseController
{

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        return view('admin::clients.index')->with('clients',$this->client->all());
    }

    public function create()
    {
        return view('admin::clients.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), ['name' => 'required|max:255|unique:oauth_clients']);

        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }

        $this->client->create(['name' => $request->input('name'),'id' => rand(strlen($request->input('name')),1000), 'secret' => bcrypt(rand(1,10)) ]);

        return redirect(route('admin.client.index'))->with('status', 'Saved !!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        return $this->update($id);
    }

    public function update($id)
    {
        $this->client->find($id)->update(['secret' => bcrypt(rand(1,10))]);
        return redirect(route('admin.client.index'))->with('status', 'Updated !!');
    }

    public function delete($id)
    {
       $this->client->find($id)->delete();
       return redirect(route('admin.client.index'))->with('status', 'Excluded !!');
    }
}

