
<div x-data="isDialogOpen()" @toggle-modal.window="modal = !modal" class='h-screen w-full' style="background-image: url({{ URL::asset('img/map.jpg') }})">
    <div class='w-full' x-data="reassignDialog()" @toggle-reassign-modal.window="reassignmodal = !reassignmodal">
        <div class='w-full flex'>
            <div class='bg-yellow-100 rounded-lg mt-2 w-7/12 mx-auto flex justify-around'>
                <div class='bg-yelloy-300 text-xl text-black'>
                    747
                </div>
                <div class='bg-yelloy-300 text-xl text-black'>
                    Estabilidad 2%
                </div>
                <div class='bg-yelloy-300 text-xl text-black'>
                    23,258
                </div>
            </div>
        </div>

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
                                <div x-show="openTab === 1">Tab #1</div>
                                <div x-show="openTab === 2">Tab #2</div>
                                <div x-show="openTab === 3">Tab #3</div>
                                <div x-show="openTab === 4">Tab #4</div>
                            </div>
                        </div>
                    </div>
                    <div class='flex justify-around'>
                        <div class='w-1/4'>
                            Dinero
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


        <div x-data="reassignDialog()" @toggle-reassign-modal.window="reassignmodal = !reassignmodal" >
            <div class="overflow-auto" style="background-color: rgba(0, 0, 0, 0.75);display:none" x-show="isOpenReassign()" :class="{ 'reassign-history-modal': isOpenReassign() }" >
                <!-- dialog -->
                <div class="bg-white shadow-2xl" x-show="isOpenReassign()" @click.away="closeReassign">
                    <div class="modal-header">
                        <h3>[REASSIGN] Reassign Ticket</h3>
                        <button type="button" @click="closeReassign"><svg width="14" height="14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 1L1 13M1 1l12 12" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
                    </div>
                    <div class="modal-content">
                        
                    </div>
                </div><!-- /dialog -->
            </div><!-- /overlay -->
        </div>

        <button x-data @click="$dispatch('toggle-modal')" class='absolute bottom-0 left-0 w-5/8 bg-yellow-100 rounded-lg'>Operaciones</button>
        <button x-data @click="$dispatch('toggle-reassign-modal')" class='absolute bottom-0 right-0 w-5/8 bg-yellow-100 rounded-lg''>Region</button>
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