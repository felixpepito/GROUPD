<?PHP

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'ID_Number' => 'required',
            'phone_contact' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.store');
    }
    public function markAsComplete($id)
    {
        $order = Order::findOrFail($id);
        $order->status = true;
        $order->save();

        return response()->json(['success' => true]);
    }
    
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

}