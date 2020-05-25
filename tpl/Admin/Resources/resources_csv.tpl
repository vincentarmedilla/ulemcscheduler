"{translate key='Name'}","{translate key='Status'}","{translate key='Schedule'}","{translate key='ResourceType'}","{translate key='SortOrder'}","{translate key='Location'}","{translate key='Contact'}","{translate key='Description'}","{translate key='Notes'}","{translate key='ResourceAdministrator'}"
{foreach from=$Resources item=resource}
"{$resource->GetName()|escape:'quotes'}","{if $resource->IsAvailable()}{translate key='Available'}{elseif $resource->IsUnavailable()}{translate key='Unavailable'}{else}{translate key='Hidden'}{/if}","{$Schedules[$resource->GetScheduleId()]}","{if $resource->HasResourceType()}{($ResourceTypes[$resource->GetResourceTypeId()]->Name())|escape:'quotes'}{/if}",{$resource->GetSortOrder()|default:"0"},"{$resource->GetLocation()|escape:'quotes'}","{$resource->GetContact()|escape:'quotes'}","{$resource->GetDescription()|escape:'quotes'}","{$resource->GetNotes()|escape:'quotes'}","{($GroupLookup[$resource->GetAdminGroupId()]->Name)|escape:'quotes'}"
{/foreach}


