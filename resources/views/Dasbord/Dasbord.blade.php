@extends('Main')
@section('content')

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                "on-surface": "#191c1d",
                "on-error-container": "#93000a",
                "tertiary": "#006399",
                "surface-container-high": "#e7e8e9",
                "secondary-fixed": "#e4e2e2",
                "on-tertiary-container": "#003a5c",
                "secondary": "#5e5e5e",
                "on-secondary": "#ffffff",
                "secondary-container": "#e1dfdf",
                "outline": "#8c7263",
                "surface-container-lowest": "#ffffff",
                "error": "#ba1a1a",
                "surface-dim": "#d9dadb",
                "primary-fixed-dim": "#ffb68b",
                "on-secondary-container": "#626262",
                "on-tertiary": "#ffffff",
                "inverse-on-surface": "#f0f1f2",
                "surface-container-low": "#f3f4f5",
                "on-primary-fixed": "#321200",
                "tertiary-container": "#00a8ff",
                "primary-container": "#ff7a00",
                "tertiary-fixed": "#cde5ff",
                "on-primary": "#ffffff",
                "inverse-surface": "#2e3132",
                "on-tertiary-fixed": "#001d32",
                "on-background": "#191c1d",
                "on-primary-fixed-variant": "#753400",
                "surface-bright": "#f8f9fa",
                "secondary-fixed-dim": "#c7c6c6",
                "on-primary-container": "#5c2800",
                "error-container": "#ffdad6",
                "inverse-primary": "#ffb68b",
                "surface": "#f8f9fa",
                "on-secondary-fixed-variant": "#464747",
                "surface-container-highest": "#e1e3e4",
                "primary": "#994700",
                "tertiary-fixed-dim": "#95ccff",
                "primary-fixed": "#ffdbc8",
                "on-secondary-fixed": "#1b1c1c",
                "on-tertiary-fixed-variant": "#004a75",
                "surface-variant": "#e1e3e4",
                "outline-variant": "#e0c0af",
                "on-surface-variant": "#584235",
                "background": "#f8f9fa",
                "surface-container": "#edeeef",
                "on-error": "#ffffff",
                "surface-tint": "#994700"
              },
              fontFamily: {
                "headline": ["Manrope"],
                "body": ["Inter"],
                "label": ["Inter"]
              },
              borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
            },
          },
        }
      </script>

<main class="main-wrapper" >
  <!-- Metric Bento Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
  <!-- Total Products -->
    <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_8px_24px_rgba(25,28,29,0.06)] group hover:shadow-[0_12px_32px_rgba(25,28,29,0.1)] transition-all flex flex-col justify-between h-48 border border-transparent hover:border-orange-100">
      <div class="flex justify-between items-start">
      <span class="text-secondary font-label text-sm">Total Products</span>
        <div class="p-2 bg-orange-50 text-orange-700 rounded-lg">
          <span class="material-symbols-outlined" data-icon="inventory">inventory</span>
        </div>
      </div>
    <div class="mt-4">
      <div class="text-4xl font-black text-on-surface tracking-tight mb-1">1,284</div>
      <div class="flex items-center gap-1 text-tertiary font-bold text-sm">
        <span class="material-symbols-outlined text-sm" data-icon="trending_up">trending_up</span>
                                  +12% <span class="text-secondary font-normal ml-1">from last month</span>
      </div>
    </div>
  </div>
  <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_8px_24px_rgba(25,28,29,0.06)] group hover:shadow-[0_12px_32px_rgba(25,28,29,0.1)] transition-all flex flex-col justify-between h-48 border border-transparent hover:border-error-container">
    <div class="flex justify-between items-start">
      <span class="text-secondary font-label text-sm">Low Stock Items</span>
      <div class="p-2 bg-error-container text-on-error-container rounded-lg">
        <span class="material-symbols-outlined" data-icon="warning" data-weight="fill" style="font-variation-settings: 'FILL' 1;">warning</span>
      </div>
    </div>
    <div class="mt-4">
      <div class="text-4xl font-black text-on-surface tracking-tight mb-1">24</div>
      <div class="flex items-center gap-2">
        <span class="px-2 py-0.5 bg-error-container text-on-error-container text-xs font-bold rounded-full">8 CRITICAL</span>
        <span class="text-secondary text-sm">Requires Attention</span>
      </div>
    </div>
  </div>
  <!-- Orders Today -->
  <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_8px_24px_rgba(25,28,29,0.06)] group hover:shadow-[0_12px_32px_rgba(25,28,29,0.1)] transition-all flex flex-col justify-between h-48 border border-transparent hover:border-orange-100">
    <div class="flex justify-between items-start">
      <span class="text-secondary font-label text-sm">Orders Today</span>
      <div class="p-2 bg-orange-50 text-orange-700 rounded-lg">
        <span class="material-symbols-outlined" data-icon="local_shipping">local_shipping</span>
      </div>
    </div>
    <div class="mt-4">
      <div class="text-4xl font-black text-on-surface tracking-tight mb-1">156</div>
      <div class="flex items-center gap-1 text-secondary text-sm">
        <span class="material-symbols-outlined text-sm" data-icon="schedule">schedule</span>
                                  Last 24h activity
      </div>
    </div>
  </div>
  <!-- Monthly Revenue -->
  <div class="bg-surface-container-lowest p-8 rounded-xl shadow-[0_8px_24px_rgba(25,28,29,0.06)] group hover:shadow-[0_12px_32px_rgba(25,28,29,0.1)] transition-all flex flex-col justify-between h-48 border border-transparent hover:border-orange-100">
    <div class="flex justify-between items-start">
      <span class="text-secondary font-label text-sm">Monthly Revenue</span>
      <div class="p-2 bg-orange-50 text-orange-700 rounded-lg">
         <span class="material-symbols-outlined" data-icon="payments">payments</span>
      </div>
    </div>
    <div class="mt-4">
      <div class="text-4xl font-black text-on-surface tracking-tight mb-1">$42,850</div>
      <div class="flex items-center gap-1 text-tertiary font-bold text-sm">
        <span class="material-symbols-outlined text-sm" data-icon="add_circle">add_circle</span>
                                    +5.4% <span class="text-secondary font-normal ml-1">vs target</span>
      </div>
    </div>
  </div>
  </div>
<!-- Asymmetric Layout Section -->
<div class="mt-24 grid grid-cols-1 lg:grid-cols-3 gap-12">
<!-- Recent Activity (Large Column) -->
<div class="lg:col-span-2 space-y-8">
  <div class="flex items-center justify-between">
    <h2 class="text-2xl font-bold tracking-tight">Recent Stock Movements</h2>
    <a class="text-primary font-bold text-sm hover:underline decoration-2 underline-offset-4" href="#">View All Logs</a>
  </div>
  <div class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-surface-container-low/50">
          <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-secondary">Product</th>
          <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-secondary">Action</th>
          <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-secondary">Quantity</th>
          <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-secondary">User</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-surface-container-high">
        <tr class="hover:bg-slate-50 transition-colors">
          <td class="px-6 py-5">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-400">
                <span class="material-symbols-outlined" data-icon="image">image</span>
              </div>
              <div>
                <p class="font-bold text-on-surface">Ergonomic Office Chair</p>
                <p class="text-xs text-secondary">CH-4829-BK</p>
              </div>
            </div>
          </td>
          <td class="px-6 py-5">
            <span class="px-3 py-1 bg-tertiary-container text-on-tertiary-container text-xs font-bold rounded-full">RESTOCK</span>
          </td>
          <td class="px-6 py-5 font-semibold text-tertiary">+45 units</td>
          <td class="px-6 py-5 text-secondary text-sm">Sarah Jenkins</td>
        </tr>
        <tr class="hover:bg-slate-50 transition-colors">
          <td class="px-6 py-5">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-400">
                <span class="material-symbols-outlined" data-icon="image">image</span>
              </div>
              <div>
                <p class="font-bold text-on-surface">Mechanical Keyboard TKL</p>
                <p class="text-xs text-secondary">KB-9011-RD</p>
              </div>
            </div>
          </td>
          <td class="px-6 py-5">
            <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full">DISPATCH</span>
          </td>
          <td class="px-6 py-5 font-semibold text-primary">-12 units</td>
          <td class="px-6 py-5 text-secondary text-sm">Warehouse Bot B2</td>
        </tr>
        <tr class="hover:bg-slate-50 transition-colors">
          <td class="px-6 py-5">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-400">
                <span class="material-symbols-outlined" data-icon="image">image</span>
              </div>
              <div>
                <p class="font-bold text-on-surface">Thunderbolt 4 Dock</p>
                <p class="text-xs text-secondary">ACC-002-GR</p>
              </div>
            </div>
          </td>
          <td class="px-6 py-5">
          <span class="px-3 py-1 bg-error-container text-on-error-container text-xs font-bold rounded-full">ADJUSTMENT</span>
          </td>
          <td class="px-6 py-5 font-semibold text-error">-2 units</td>
          <td class="px-6 py-5 text-secondary text-sm">Alex Rivera</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Secondary Column (Asymmetric Small) -->
<div class="space-y-8">
  <h2 class="text-2xl font-bold tracking-tight">System Status</h2>
  <div class="bg-on-surface text-white p-8 rounded-2xl shadow-xl shadow-slate-900/10">
    <div class="flex items-center justify-between mb-8">
      <span class="font-bold text-orange-400">Instance INV-MGR</span>
      <span class="flex items-center gap-1.5 text-xs bg-white/10 px-2 py-1 rounded-full text-emerald-400">
      <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                                      ONLINE
                                  </span>
    </div>
    <div class="space-y-6">
      <div>
      <div class="flex justify-between text-xs mb-2 opacity-60">
        <span>Storage Capacity</span>
        <span>84% Full</span>
      </div>
      <div class="w-full bg-white/10 h-1.5 rounded-full overflow-hidden">
        <div class="bg-orange-500 h-full w-[84%]"></div>
      </div>
      </div>
      <div>
        <div class="flex justify-between text-xs mb-2 opacity-60">
          <span>API Latency</span>
          <span>42ms</span>
        </div>
        <div class="w-full bg-white/10 h-1.5 rounded-full overflow-hidden">
          <div class="bg-orange-500 h-full w-[15%]"></div>
        </div>
      </div>
    </div>
    <button class="w-full mt-10 py-3 bg-white text-on-surface font-bold rounded-lg hover:bg-orange-50 transition-colors">
                                Manage Resources
                            </button>
  </div>
</div>
</div>
</div>
</main>
@endsection

