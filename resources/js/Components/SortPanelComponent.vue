<template>

    <div class="bg-gray-800 py-2 mt-3 flex justify-between px-3  items-center">
        
        <section class="w-4/12">
            <h2 class="text-center text-white text-xl font-bold">Рейтинг серверов</h2>
        </section>

        <section class="w-8/12 flex justify-evenly">
            <label class="text-white" for="rates">Рейты
            <select class="h-8 text-xs text-black rounded" name="rates" id="rates" style="min-width: 120px">
                <option value="10" selected>x10</option>
                <option value="50">x50</option>
                <option value="100">x100</option>
            </select>
             </label>

             <label class="text-white" for="chronicles">
                Хроники
                <select class="h-8 text-xs text-black rounded" name="chronicles" id="chronicles" style="min-width: 120px">
                    <option value="Interlude" selected>Interlude</option>
                    <option value="Gracia">Gracia</option>
                    <option value="Interlude+">Interlude+</option>
                </select>
             </label>

             <label class="text-white" for="chronicles">
                    Дата открытия
                <select class="h-8 text-xs text-black rounded" name="chronicles" id="chronicles" style="min-width: 120px">
                    <option value="Interlude" selected>Уже открылись</option>
                    <option value="Gracia">Завтра</option>
                    <option value="Interlude+">Сегодня</option>
                </select>
             </label>

             <button class="bg-blue-500 px-3 py-1 text-white rounded">Подобрать</button>
             
        </section>

    </div>

</template>


<script>

export default {

    name: 'SortPanelComponent', 

    setup() {

        

    }

}

</script>