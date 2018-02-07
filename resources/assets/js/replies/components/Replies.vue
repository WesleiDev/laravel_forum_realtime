<template>
    <div>
    <div class="card"> 
        <div class="card-content">
            <span class="card-title">{{title}}</span>
        
            <blockquote>
            Id illum nesciunt tempore aut qui libero aut. Aperiam provident eaque et repudiandae labore molestiae voluptate ut. Ad totam dolores ut enim odio perspiciatis.Hic rerum necessitatibus non ratione pariatur laboriosam et.
            </blockquote>
        </div>
    </div>
    <div class="card"> 
        <div class="card-content">
            <span class="card-title">Erik {{replied}}</span>
        
            <blockquote>
            Id illum nesciunt tempore aut qui libero aut. Aperiam provident eaque et repudiandae labore molestiae voluptate ut. Ad totam dolores ut enim odio perspiciatis.Hic rerum necessitatibus non ratione pariatur laboriosam et.
            </blockquote>
        </div>
    </div>
    <div class="card"> 
        <div class="card-content">
            <span class="card-title">Erik {{replied}}</span>
        
            <blockquote>
            Id illum nesciunt tempore aut qui libero aut. Aperiam provident eaque et repudiandae labore molestiae voluptate ut. Ad totam dolores ut enim odio perspiciatis.Hic rerum necessitatibus non ratione pariatur laboriosam et.
            </blockquote>
        </div>
    </div>
    <div class="card"> 
        <div class="card-content">
            <span class="card-title">{{replied}}</span>
        
            <blockquote>
            Id illum nesciunt tempore aut qui libero aut. Aperiam provident eaque et repudiandae labore molestiae voluptate ut. Ad totam dolores ut enim odio perspiciatis.Hic rerum necessitatibus non ratione pariatur laboriosam et.
            </blockquote>
        </div>
    </div>
    <div class="card grey lighten-4"> 
        <div class="card-content">
            <span class="card-title">{{reply}}</span>
            <form>
                <div class="input-field">
                    <textarea 
                    class="materialize-textarea" :placeholder="yourAnswer"></textarea>
                    <button type="submit" class="btn red accent-2">{{send}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props:[
            'title',
            'replied',
            'reply',
            'send',
            'yourAnswer']
    }
</script>
