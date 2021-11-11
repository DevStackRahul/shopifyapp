<style>
   .sm\:block.sm\:ml-3 .flex a.active {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
    position: relative;
    padding: 10px 15px;
    text-decoration: none;
}
.sm\:block.sm\:ml-3 .flex {
    border-bottom: 1px solid #ddd;
    padding-bottom: 6px;
}
.sm\:block.sm\:ml-3 .flex a {
    padding: 10px 15px;
    font-size: 16px;
        border-radius: 4px 4px 0 0;
        margin-right: 2px;
        color: #333;
          text-decoration: none;
}
.card-body p {
    padding: 15px;
}
.sm\:block.sm\:ml-3 .flex a:hover {
    border-color: #eee #eee #ddd;
    background-color: #eee;
} 
.row.header h3 {
    font-size: 1.7rem;
    font-weight: 600;
    line-height: 2.4rem;
    color: #333;
    text-align: left;
  padding-left: 20px;
    padding-bottom: 20px;
    padding-top: 10px;
}
input[type="search"] {
    border: 0.1rem solid #dadada;
    height: 40px;
    border-radius: 5px;
    margin-bottom: 5px;
    padding: 10px;
}
    div#example_filter {
    margin-bottom: 20px;
}
div#example_paginate a.paginate_button.current {
    padding: 10px 20px!important;
    height: 30px;
    line-height: 30px;
    padding-top: 0px !important;
    border-radius: 3px;
}
.row.header h3 {
    font-size: 2.7rem;
    font-weight: 600;
    line-height: 2.4rem;
    color: #fff;
    text-align: center;
    background: #5e8e3e;
    border-radius: 5px;
    padding: 15px;
}
</style>
<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-24 md:h-16">
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="sm:block sm:ml-3">
            <div class="flex flex-wrap justify-center md:justify-start">
                <a href="{{ url('/') }}"
                    class=" @if(Request::path() == '/' ? 'active' : null)active @endif px-3 py-2 rounded-md text-sm font-medium leading-5 text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                    Dashboard
                </a>

                <a href="{{ url('products') }}" class="@if(Request::path() == 'products')active @endif ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                  Products
                </a>

                <a href="{{ url('design') }}" class="@if(Request::path() == 'design')active @endif ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                  Design
                </a>
                
                <a href="{{ url('bundle-details') }}" class="@if(Request::path() == 'bundle-details')active @endif ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                  Bundle Details
                </a>

            </div>
          </div>
        </div>
      </div>
    </div>
</nav>