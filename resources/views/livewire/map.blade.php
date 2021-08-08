
<div x-data="isDialogOpen()" @toggle-modal.window="modal = !modal" class=' w-full' style="height: 93vh; background-image: url({{ URL::asset('img/map.png') }})">
    <div class='w-full' x-data="reassignDialog()" @toggle-reassign-modal.window="reassignmodal = !reassignmodal">
        <div class='w-full flex'>
            <div class='bg-yellow-100 rounded-lg mt-2 w-7/12 mx-auto flex justify-around'>
                <div class='bg-yelloy-300 text-xl text-black'>
                    {{ $poblacion_a_favor }}
                </div>
                <div class='bg-yelloy-300 text-xl text-black'>
                    Estabilidad {{ $estabilidad }} %
                </div>
                <div class='bg-yelloy-300 text-xl text-black'>
                    {{ $poblacion_neutral }}
                </div>
            </div>
        </div>

        <!-- Operaciones -->
        <div x-data="isDialogOpen()" @toggle-modal.window="modal = !modal" >
            <!-- overlay -->
            <div class="overflow-auto" style="background-color: rgba(0, 0, 0, 0.75);display:none" x-show="isOpen()" :class="{ 'user-history-modal': isOpen() }" >
            <!-- dialog -->
                <div class="bg-white shadow-2xl" x-show="isOpen()" @click.away="close">
                    <div class="modal-header">
                        
                        <button type="button" @click="close"><svg width="14" height="14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 1L1 13M1 1l12 12" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
                    </div>
                    <div class="modal-content">
                        <div  x-data="{openTab: 1, activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="p-6">
                            <ul class="flex border-b w-full justify-around">
                                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1 w-1/4">
                                    <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold " href="#">
                                        Resumen
                                    </a>
                                </li>
                                <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                        Civil
                                    </a>
                                </li>
                                <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 3 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                        Gobierno
                                    </a>
                                </li>
                                <li @click="openTab = 4" :class="{ '-mb-px': openTab === 4 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 4 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                        Militar
                                    </a>
                                </li>
                            </ul>
                            
                        
                            <div class="w-full pt-4">
                                <div x-show="openTab === 1" style='display:none;'>
                                    <div class='flex items-center'>
                                        <div class='w-3/5'>
                                            <img  src="{{ URL::asset('img/resumen.gif') }}" alt="this slowpoke moves" class='mx-auto' />
                                        </div>
                                        <div class='w-1/5'>
                                            <div class='p-2'>
                                                <h1 class='w-full text-center text-yellow-900'>Hopeful Dawn</h1>
                                                <div class='bg-yellow-100 p-3'>
                                                    <p class='text-yellow-900'>Mision: Estabiliza la región</p>
                                                    <p class='text-yellow-900'>Duración: 55 mes(s)</p>
                                                    <p class='text-yellow-900'>Gobernador: Sirviente Civil</p>
                                                    <p class='text-yellow-900'>Presupuesto Anual: 30$</p>
                                                    <p class='text-yellow-900'>Dificulta: Casual</p>
                                                </div>
                                            </div>
                                            <div class='p-2'>
                                                <h1 class='w-full text-center text-yellow-900'>Corrupción</h1>
                                                <div class='bg-yellow-100 p-3'>
                                                    <p class='text-yellow-900'>La corrupción esta disminuyendo tu nivel de apoyo en 7%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="openTab === 2" style='display:none;'>
                                    
                                    <div class='flex items-center'>
                                        
                                        <div class='w-3/5'>
                                            <div class='flex justify-around'>
                                                <button wire:click="postAdded"> Discusiones {{$postCount}} </button>
                                                <button wire:click="postAdded"> Servicios {{$postCount}} </button>
                                                <button wire:click="postAdded"> Infraestructura {{$postCount}} </button>
                                            </div>   
                                        </div>
                                        <div class='w-1/5'>
                                            <div class='p-2'>
                                                <h1 class='w-full text-center text-yellow-900'>Desarrollo Discusiones</h1>
                                                <div class='bg-yellow-100 p-3'>
                                                    <p class='text-yellow-900 h-full'>
                                                        Trabajas con la gente local para comprender sus requisitos economicos, 
                                                        comerciales y laborales</p> 
                                                       
                                                </div>
                                            </div>
                                        </div>    
                                    </div>         
                                    
                                </div>
                                <div x-show="openTab === 3" style='display:none;'>
                                       
                                    <div class='flex items-center'>   
                                        <div class='w-3/5'>
                                            <div class='flex justify-around'>  
                                                <button wire:click="postAdded"> Corrupcion {{$postCount}} </button>
                                                <button wire:click="postAdded"> Representativos {{$postCount}} </button> 
                                                <button wire:click="postAdded"> Milicia {{$postCount}} </button>
                                            </div>   
                                        </div>
                                        <div class='w-1/5'>
                                            <div class='p-2'>
                                                <h1 class='w-full text-center text-yellow-900'>Anticorrupcion 1</h1>
                                                <div class='bg-yellow-100 p-3'>
                                                    <p class='text-yellow-900 h-full'>
                                                        Establece una linea directa basica y un sistema de informes de 
                                                        sitios web para que las victimas de corrupcion
                                                        puedan denunciar abusos de poder,
                                                        como el soborno y el nepotismo</p> 
                                                    
                                                </div>
                                            </div>
                                        </div>    
                                    </div>         
                                   
                                </div>
                                <div x-show="openTab === 4" style='display:none;'>
                                    
                                    <div class='flex items-center'>
                                        
                                        <div class='w-3/5'>
                                            <div class='flex justify-around'>
                                                <button wire:click="postAdded"> Coalicion {{$postCount}} </button>        
                                            </div>   
                                        </div>
                                        <div class='w-1/5'>
                                            <div class='p-2'>
                                                <h1 class='w-full text-center text-yellow-900'>Lanzar soldados de coalicion1</h1>
                                                <div class='bg-yellow-100 p-3'>
                                                    <p class='text-yellow-900 h-full'>
                                                        Solicitar el despliegue tenporal de una unidad internacional con la coalicion,
                                                        (Color azul)</p> 
                                                </div>
                                            </div>
                                        </div>    
                                    </div>         
                                    
                                </div>
                            </div>
                      
                        </div>
                    </div>
                    <div class='p-6 flex justify-around'>
                        <div class='w-1/4'>
                            Dinero {{ $postCount }}
                        </div>
                        <div class='w-1/4'>
                            Nivel de apoyo %
                        </div>
                        <div class='w-1/4'>
                            Inflacion %
                        </div>
                        <div class='w-1/4'>
                            Riesgo de corrupcion
                        </div>
                    </div>
                </div><!-- /dialog -->
            </div><!-- /overlay -->
        </div>

        <!-- Regiones  -->
        <div x-data="reassignDialog()" @toggle-reassign-modal.window="reassignmodal = !reassignmodal" >
            <div class="overflow-auto" style="background-color: rgba(0, 0, 0, 0.75);display:none" x-show="isOpenReassign()" :class="{ 'reassign-history-modal': isOpenReassign() }" >
                <!-- dialog -->
                <div class="bg-white shadow-2xl" x-show="isOpenReassign()" @click.away="closeReassign">
                    <div class="modal-header">
                        <button type="button" @click="closeReassign"><svg width="14" height="14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 1L1 13M1 1l12 12" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
                    </div>
                    <div class="modal-content">
                        <div  x-data="{openTab: 1, activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="p-6">
                            <ul class="flex border-b w-full justify-around">
                                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1 w-1/4">
                                    <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold " href="#">
                                        Estabilidad
                                    </a>
                                </li>
                                <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                        Reputación
                                    </a>
                                </li>
                                <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 3 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                        Insurgentes
                                    </a>
                                </li>
                                <li @click="openTab = 4" :class="{ '-mb-px': openTab === 4 }" class="mr-1 w-1/4">
                                    <a :class="openTab === 4 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                        Estadísticas
                                    </a>
                                </li>
                            </ul>
                            <div class="w-full pt-4">
                                <div x-show="openTab === 1" style='display:none;'>
                                    <div class='flex items-center'>
                                        <div class='w-full text-center'>
                                            Estabilidad 0% alcanzado
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

        <button x-data @click="$dispatch('toggle-modal')" class='absolute bottom-0 left-0 w-5/8 bg-yellow-100 rounded-lg'>Operaciones</button>
        <button x-data @click="$dispatch('toggle-reassign-modal')" class='absolute bottom-0 right-0 w-5/8 bg-yellow-100 rounded-lg'>Region</button>
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
        Livewire.emit('postAdded');
        Livewire.emit('cal_poblacion');
    }, 2000);
    //Livewire.emit('postAdded');
</script>