@props([
    'followers',
    'followings',
])

<section class="flex flex-col gap-3">
    <article class="flex flex-col items-center gap-2">
        <h2 class="uppercase">
            Followers
        </h2>

        <x-list.profiles
            :profiles="$followers"
            message="This user does not have any followers."
        />
    </article>
    
    <article class="flex flex-col items-center gap-2">
        <h2 class="uppercase">
            Following
        </h2>

        <x-list.profiles 
            :profiles="$followings"
            message="This user does not follow any other users."
        />
    </article>
</section>
