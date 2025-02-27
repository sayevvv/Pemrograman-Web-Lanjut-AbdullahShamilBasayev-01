<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="mb-4 text-2xl font-bold text-gray-800">Sales Summary</h2>

        <div class="p-4 mb-4 bg-blue-100 border border-blue-300 rounded-lg">
            <strong>Total Sales:</strong> {{ $totalSales }} items sold.
        </div>

        <section class="p-4 border border-gray-300 shadow-md rounded-lg bg-white">
            <h5 class="text-lg font-semibold text-gray-700 mb-4">Sales Transactions</h5>

            @if($sales->isEmpty())
                <p class="text-gray-500">No sales recorded yet.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 border">Sale ID</th>
                                <th class="p-2 border">Product</th>
                                <th class="p-2 border">Quantity</th>
                                <th class="p-2 border">Total Price</th>
                                <th class="p-2 border">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                                @foreach($sale->items as $item)
                                    <tr class="border-b">
                                        <td class="p-2 border">{{ $sale->id }}</td>
                                        <td class="p-2 border">{{ $item->product->name }}</td>
                                        <td class="p-2 border">{{ $item->quantity }}</td>
                                        <td class="p-2 border">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                                        <td class="p-2 border">{{ $sale->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </div>
</x-layout>
