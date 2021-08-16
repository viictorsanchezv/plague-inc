<div x-data="isDialogOpen()" @toggle-modal.window="modal = !modal" class=' w-full' style="height: 93vh; background-image: url({{ URL::asset('img/map.png') }})">
    <div class='w-full' x-data="reassignDialog()" @toggle-reassign-modal.window="reassignmodal = !reassignmodal">
        <div class='w-full flex'>
            <div class='bg-yellow-100 border-2 border-yellow-800 rounded-lg mt-2 w-7/12 mx-auto flex justify-around'>
                <div class='bg-yelloy-300 text-xl text-black'>
                    {{ $poblacion_a_favor }}
                </div>
                <div class='bg-yelloy-500 text-xl text-black'>
                    Estabilidad {{ $estabilidad }} %
                </div>
                <div class='bg-yelloy-300 text-xl text-black'>
                    {{ $poblacion_neutral }}
                </div>
            </div>
          
        </div>
        <div class="pt-1">
            <div style='border: 1px solid gray; position: absolute; bottom: 50px; right: 0px; height: 200px; background-color: rgba(0,0,0, 0.2); width: 5%; color: white; display:flex; flex-direction: column; justify-content: end;'>
                <div style='height: {{$reputacion}}%; background-color: rgba(63, 236, 91, 0.5);'>
                    <p class='font-bold text-center'>Reputacion {{ $reputacion }}</p>    
                </div>
            </div>
        </div>
        <!-- Operaciones -->
        <div x-data="isDialogOpen()" @toggle-modal.window="modal = !modal" >
            <!-- overlay -->
            <div class="overflow-auto" style="background-color: rgba(0, 0, 0, 0.75);display:none" x-show="isOpen()" :class="{ 'user-history-modal': isOpen() }" >
            <!-- dialog -->
                <div class="bg-green-100 shadow-2xl" x-show="isOpen()" @click.away="close">
                    <div class="modal-content">
                        <div  x-data="{openTab: 1, activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: ' hover:text-blue-800'}" class="p-6">
                            <ul class="flex border-b w-full justify-around">
                                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1 w-1/4">
                                    <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="w-full text-center text-black bg-yellow-50 inline-block py-2 px-4 font-semibold " href="#">
                                        Resumen
                                    </a>
                                </li>
                                <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 2 ?  activeClasses : inactiveClasses" class="w-full text-center text-black bg-yellow-50 inline-block py-2 px-4 font-semibold" href="#">
                                        Civil
                                    </a>
                                </li>
                                <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 3 ? activeClasses : inactiveClasses" class="w-full text-center text-black bg-yellow-50 inline-block py-2 px-4 font-semibold" href="#">
                                        Gobierno
                                    </a>
                                </li>
                                <li @click="openTab = 4" :class="{ '-mb-px': openTab === 4 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 4 ? activeClasses : inactiveClasses" class="w-full text-center text-black bg-yellow-50 inline-block py-2 px-4 font-semibold" href="#">
                                        Militar
                                    </a>
                                </li>
                            </ul>
                            
                        
                            <div class="w-full pt-4">
                                <div x-show="openTab === 1" style='display:none;'>
                                    <div class='flex items-center'>
                                        <div class='w-3/5'>
                                            <img  src="{{ URL::asset('img/resumen.gif') }}" alt="this slowpoke moves" class='mx-auto w-full' />
                                        </div>
                                        <div class='w-2/5'>
                                            <div class='p-2 w-full'>
                                                <h1 class='w-full text-center text-yellow-900'>Hopeful Dawn</h1>
                                                <div class='bg-yellow-100 p-3'>
                                                    <p class='text-yellow-900'>Mision: Estabiliza la región</p>
                                                    <p class='text-yellow-900'>Duración: 55 mes(s)</p>
                                                    <p class='text-yellow-900'>Gobernador: Sirviente Civil</p>
                                                    <p class='text-yellow-900'>Presupuesto Anual: {{ $dinero }}</p>
                                                    <p class='text-yellow-900'>Dificultad: Casual</p>
                                                </div>
                                            </div>
                                            <div class='p-2 w-full'>
                                                <h1 class='w-full text-center text-yellow-900'>Corrupción</h1>
                                                <div class='bg-yellow-100 p-3'>
                                                    <p class='text-yellow-900'>La corrupción esta disminuyendo tu nivel de apoyo en {{ $corrupcion }}%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="openTab === 2" style='display:none;'>
                                    
                                    <div class='flex items-center'>
                                        
                                        <div class='w-3/5'>
                                            <div class='flex justify-around'>
                                                <button class='bg-green-700 p-5 rounded-full shadow-md  text-white' wire:click="operaciones('civil','desarrollo')"> Discusiones - Comprar </button>
                                                <button class='bg-green-700 p-5 rounded-full shadow-md  text-white' wire:click="operaciones('civil','necesidad')"> Servicios - Comprar </button>
                                                <button class='bg-green-700 p-5 rounded-full shadow-md  text-white' wire:click="operaciones('civil','infraestructura')"> Infraestructura - Comprar </button>
                                            </div>   
                                        </div>
                                        <div class='w-1/5'>
                                            <div class='p-2 bg-yellow-100'>
                                                <h1 class='w-full text-center text-yellow-900 font-bold'>{{ $titulo_operacion }}</h1>
                                                <div class='p-3'>
                                                    <p class='text-yellow-900 h-full'>
                                                        {{ $descripcion_operacion }}</p> 
                                                    <p class='bg-green-100 w-full shadow-md py-3 px-6 text-center my-3'>COMPRADO COSTO {{ $valor_operacion }} $</p>  
                                                </div>
                                            </div>
                                        </div>    
                                    </div>         
                                </div>
                                <div x-show="openTab === 3" style='display:none;'>
                                       
                                    <div class='flex items-center'>   
                                        <div class='w-3/5'>
                                            <div class='flex justify-around'>  
                                                <button class='bg-green-700 p-5 rounded-full shadow-md  text-white' wire:click="operaciones('gobierno','corrupcion')"> Corrupcion - Comprar </button>
                                                <button class='bg-green-700 p-5 rounded-full shadow-md  text-white' wire:click="operaciones('gobierno','milicia')"> Milicia - Comprar </button> 
                                                <button class='bg-green-700 p-5 rounded-full shadow-md  text-white' wire:click="operaciones('gobierno','distritos')"> Distritos - Comprar </button>
                                            </div>   
                                        </div>
                                        <div class='w-1/5'>
                                            <div class='p-2 bg-yellow-100'>
                                                <h1 class='w-full text-center text-yellow-900 font-bold'>{{ $titulo_operacion }}</h1>
                                                <div class=' p-3'>
                                                    <p class='text-yellow-900 h-full'>
                                                        {{ $descripcion_operacion  }}</p> 
                                                    <p class='py-3 px-6 bg-green-100 shadow-md w-full my-3'>COMPRADO COSTO {{ $valor_operacion }} $</p>  
                                                </div>
                                            </div>
                                        </div>    
                                    </div>         
                                   
                                </div>
                                <div x-show="openTab === 4" style='display:none;'>
                                    
                                    <div class='flex items-center'>
                                        
                                        <div class='w-3/5'>
                                            <div class='flex justify-around'>
                                                <button class=" bg-green-700 text-white p-5 rounded-full shadow-md" wire:click="operaciones('militar','coalicion')"> Coalicion - Comprar </button>        
                                            </div>   
                                        </div>
                                        <div class='w-1/5'>
                                            <div class='p-2 bg-yellow-100'>
                                                <h1 class='w-full text-center text-yellow-900 font-bold'>{{ $titulo_operacion }}</h1>
                                                <div class=' p-3'>
                                                    <p class='text-yellow-900 h-full'>
                                                        {{ $descripcion_operacion }}</p>
                                                    <p class='py-3 px-6 bg-green-100 shadow-md w-full my-3'>COMPRADO COSTO {{ $valor_operacion }} $</p> 
                                                </div>
                                            </div>
                                        </div>    
                                    </div>         
                                    
                                </div>
                            </div>
                      
                        </div>
                    </div>
                    <div class='p-6 flex justify-around'>
                        <div class='w-1/4 h-8 bg-yellow-100 border-2 border-green-100'>
                            Dinero {{ $dinero }}
                            
                        </div>
                        <div class='w-1/4 h-8 bg-yellow-100 border-2 border-green-100'>
                            Nivel de apoyo 
                            <div class="relative pt-1">
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                                    <div style="width:{{ $nivel_apoyo }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                </div>
                            </div>
                        </div>
                        <div class='w-1/4 h-8 bg-yellow-100 border-2 border-green-100' >
                            Inflacion
                            <div class="relative pt-1">
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                                    <div style="width:{{ $inflacion}}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
                                </div>
                            </div>
                        </div>
                        <div class='w-1/4 h-8 bg-yellow-100 border-2 border-green-100'>
                            <div class="relative pt-1">
                                Riesgo de corrupcion 
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                                    <div style="width:{{ $corrupcion }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /dialog -->
            </div><!-- /overlay -->
        </div>

        <!-- Regiones  -->
        <div x-data="reassignDialog()" @toggle-reassign-modal.window="reassignmodal = !reassignmodal" >
            <div class="overflow-auto" style="background-color: rgba(0, 0, 0, 0.75);display:none" x-show="isOpenReassign()" :class="{ 'reassign-history-modal': isOpenReassign() }" >
                <!-- dialog -->
                <div class="bg-green-100 shadow-2xl" x-show="isOpenReassign()" @click.away="closeReassign">
                    <div class="modal-content">
                        <div  x-data="{openTab: 1, activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'hover:text-blue-800'}" class="p-6">
                            <ul class="flex border-b w-full justify-around">
                                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1 w-1/4">
                                    <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="w-full text-center bg-yellow-50 inline-block py-2 px-4 font-semibold " href="#">
                                        Estabilidad 
                                    </a>
                                </li>
                                <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="w-full text-center bg-yellow-50 inline-block py-2 px-4 font-semibold" href="#">
                                        Reputación
                                    </a>
                                </li>
                                <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 3 ? activeClasses : inactiveClasses" class="w-full text-center bg-yellow-50 inline-block py-2 px-4 font-semibold" href="#">
                                        Insurgentes
                                    </a>
                                </li>
                                <li @click="openTab = 4" :class="{ '-mb-px': openTab === 4 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 4 ? activeClasses : inactiveClasses" class="w-full text-center bg-yellow-50 inline-block py-2 px-4 font-semibold" href="#">
                                        Estadísticas
                                    </a>
                                </li>
                            </ul>
                            <div class="w-full pt-4">
                                <div x-show="openTab === 1" style='display:none;'>
                                    <div class='flex items-center'>
                                        <div class='w-full text-center'>
                                            Estabilidad {{ $estabilidad }}% alcanzado
                                        </div>
                                    </div>    
                                    <div class='flex w-full justify-around items-center'>
                                        <div class='w-1/2'>
                                            <div class='p-2'>
                                                <h1 class='w-full text-center text-yellow-900'>Poblacion de la region</h1>
                                                <div class='bg-yellow-100 p-3'>
                                                    <p class='text-yellow-900'>Mision: Estabiliza la región</p>
                                                    <p class='text-yellow-900'>Duración: 55 mes(s)</p>
                                                    <p class='text-yellow-900'>Gobernador: Sirviente Civil</p>
                                                    <p class='text-yellow-900'>Presupuesto Anual: 30$</p>
                                                    <p class='text-yellow-900'>Dificulta: Casual</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='w-1/2'>
                                            <div class='p-2'>
                                                <h1 class='w-full text-center text-yellow-900'>Estabilidad y preocupaciones locales</h1>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div x-show="openTab === 2" style='display:none;'>
                                    <div class='flex w-full justify-around items-center'>
                                        <div class='w-3/5'>
                                            <h1>Logo</h1>
                                        </div> 
                                        <div class='w-1/5'>
                                            
                                            <h1 class='w-full text-center text-yellow-900'>Reputación alta</h1>
                                            
                                        </div>
                                           
                                    </div>         
                                </div>
                                <div x-show="openTab === 3" style='display:none;'>
                                    <div class='flex w-full justify-around items-center'>   
                                        <div class='w-1/2'>
                                            <h1>Evaluación de amenazas</h1>  
                                        </div>
                                        <div class='w-1/2'>
                                            <h1>Diplomacia</h1>
                                        </div>    
                                    </div>         
                                </div>
                                <div x-show="openTab === 4" style='display:none;'>
                                       
                                    <div class='w-full text-center items-center'>   
                                        <h1>Consigue Premium</h1>  
                                    </div>         
                                    
                                </div>
                            </div>
                        </div>  
                    </div>
                </div><!-- /dialog -->
            </div><!-- /overlay -->
        </div>
        
        <livewire:insurgente>
              

        <button x-data @click="$dispatch('toggle-modal')" class='text-xl font-bold border-2 border-yellow-800 absolute bottom-0 left-0 w-5/8 bg-yellow-100 rounded-lg h-14 w-1/4 text-green-400'>Operaciones</button>
        <button x-data @click="$dispatch('toggle-reassign-modal')" class='text-xl font-bold border-2 border-yellow-800 absolute bottom-0 right-0 w-5/8 bg-yellow-100 rounded-lg h-14 w-1/4 text-yellow-400'>Region</button>
    </div> 
</div>

<!-- <div class="p-3">
    <button onclick="openModal(true)" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none">
        Open Modal
    </button>
</div> -->

<!-- overlay -->
<div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 h-80 my-auto w-full flex justify-center items-start md:items-center pt-10 md:pt-0">

    <!-- modal -->
    <div id="modal" class="pacity-0 transform -translate-y-full scale-150  relative w-4/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">

        <!-- button close -->
        <button 
        onclick="openModal(false)"
        class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
        &cross;
        </button>

        <!-- header -->
        <div class="px-4 py-3 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-600">Title</h2>
        </div>

        <!-- body -->
        <div class="w-full p-3">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, quis tempora! Similique, explicabo quaerat maxime corrupti tenetur blanditiis voluptas molestias totam? Quaerat laboriosam suscipit repellat aliquam blanditiis eum quos nihil.
        </div>

        <!-- footer -->
        <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
        <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none">Save</button>
        <button 
            onclick="openModal(false)"
            class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none"
        >Close</button>
        </div>
    </div>

</div>
    
<script>
function isDialogOpen() {
    return {
        modal: false,
        open() { this.modal = true;document.body.classList.add("modal-open"); },
        close() { this.modal = false;document.body.classList.remove("modal-open"); },
        isOpen() { return this.modal === true },
    }
}

function reassignDialog() {
    return {
        reassignmodal: false,
        openReassign() { this.reassignmodal = true;document.body.classList.add("modal-open"); },
        closeReassign() { this.reassignmodal= false;document.body.classList.remove("modal-open"); },
        isOpenReassign() { return this.reassignmodal=== true },
    }
}



</script>

@livewireScripts

<script>
    setInterval(() => {
        console.log("tick");
        Livewire.emit('poblacion');
        Livewire.emit('cal_poblacion');
        console.log("nuevo evento random");
        Livewire.emit('dynamic_events');
        openModal(true)
    }, 30000);
   

    const modal_overlay = document.querySelector('#modal_overlay');
    const modal = document.querySelector('#modal');

    function openModal (value){
        const modalCl = modal.classList
        const overlayCl = modal_overlay

        if(value){
        overlayCl.classList.remove('hidden')
        setTimeout(() => {
            modalCl.remove('opacity-0')
            modalCl.remove('-translate-y-full')
            modalCl.remove('scale-150')
        }, 100);
        } else {
        modalCl.add('-translate-y-full')
        setTimeout(() => {
            modalCl.add('opacity-0')
            modalCl.add('scale-150')
        }, 100);
        setTimeout(() => overlayCl.classList.add('hidden'), 300);
        }
    }

    openModal(true)

</script>

