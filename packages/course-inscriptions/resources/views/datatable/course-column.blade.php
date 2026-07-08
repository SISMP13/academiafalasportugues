{{ optional($row->course)->getTranslation('title', app()->getLocale(), true) ?? '—' }}
