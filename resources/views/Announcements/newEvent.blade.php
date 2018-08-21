===============================
                                  New Event
===============================
**Title**: {{$event->name}}
**By**: *{{$event->Owner->username}}*
**At**: {{$event->time}} in {{$event->zone}}
**Date**: {{ \Carbon\Carbon::parse($event->date)->format('Y/m/d')}} (YYYY/mm/dd)
**Link**: {{$baseUrl}}/event/{{$event->id}}


{{$event->description}}
