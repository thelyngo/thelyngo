{if !empty($alerts)}
<script type="text/javascript">
    {foreach from=$alerts item=alert}
        toastr.{$alert.type}('{$alert.content|escape:'htmlall'}');
    {/foreach}
</script>
{/if}
