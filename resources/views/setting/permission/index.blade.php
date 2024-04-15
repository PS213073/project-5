<x-app-layout>
    <div>
         <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
             <div class="container mx-auto px-6 py-2">
                 <div class="text-right">
                 </div>

               <div class="bg-white shadow-md rounded my-6">
                 <table class="text-left w-full border-collapse">
                   <thead>
                     <tr>
                       <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Toestemming Name</th>

                       <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right"></th>
                     </tr>
                   </thead>
                   <tbody>

                     @can('Permission access')
                       @foreach($permissions as $permission)
                       <tr class="hover:bg-grey-lighter">
                         <td class="py-4 px-6 border-b border-grey-light">{{ $permission->name }}</td>
                         <td class="py-4 px-6 border-b border-grey-light text-right">
                         </td>
                       </tr>
                       @endforeach
                     @endcan

                   </tbody>
                 </table>
               </div>

             </div>
         </main>
     </div>
 </div>
 </x-app-layout>


