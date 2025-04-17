FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    python3-venv \
    python3-full \
    python3-cffi \
    python3-brotli \
    libpango-1.0-0 \
    libpangoft2-1.0-0 \
    libharfbuzz0b \
    libffi-dev \
    libjpeg-dev \
    libopenjp2-7-dev \
    libpangocairo-1.0-0 \
    build-essential \
    python3-dev \
    python3-setuptools \
    python3-wheel \
    python3-pycparser \
    libcairo2-dev \
    libzip-dev \
    git \
    wget \
    --no-install-recommends \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Installation et activation correcte des extensions PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql zip \
    && docker-php-ext-enable mysqli pdo pdo_mysql zip \
    && a2enmod rewrite \
    && service apache2 restart

# Vérification des extensions PHP installées
RUN php -m | grep -i pdo

# Création d'un environnement virtuel Python et installation de WeasyPrint
RUN python3 -m venv /opt/venv && \
    /opt/venv/bin/pip install --upgrade pip && \
    /opt/venv/bin/pip install weasyprint

# Création du script wrapper pour WeasyPrint
RUN echo '#!/bin/bash' > /usr/local/bin/weasyprint-wrapper && \
    echo '# Filtrer l option --timeout des arguments' >> /usr/local/bin/weasyprint-wrapper && \
    echo 'args=()' >> /usr/local/bin/weasyprint-wrapper && \
    echo 'skip_next=0' >> /usr/local/bin/weasyprint-wrapper && \
    echo 'for arg in "$@"; do' >> /usr/local/bin/weasyprint-wrapper && \
    echo '    if [ $skip_next -eq 1 ]; then' >> /usr/local/bin/weasyprint-wrapper && \
    echo '        skip_next=0' >> /usr/local/bin/weasyprint-wrapper && \
    echo '        continue' >> /usr/local/bin/weasyprint-wrapper && \
    echo '    fi' >> /usr/local/bin/weasyprint-wrapper && \
    echo '    if [ "$arg" == "--timeout" ]; then' >> /usr/local/bin/weasyprint-wrapper && \
    echo '        skip_next=1' >> /usr/local/bin/weasyprint-wrapper && \
    echo '        continue' >> /usr/local/bin/weasyprint-wrapper && \
    echo '    fi' >> /usr/local/bin/weasyprint-wrapper && \
    echo '    args+=("$arg")' >> /usr/local/bin/weasyprint-wrapper && \
    echo 'done' >> /usr/local/bin/weasyprint-wrapper && \
    echo '# Appeler weasyprint avec les arguments filtrés' >> /usr/local/bin/weasyprint-wrapper && \
    echo '/opt/venv/bin/weasyprint "${args[@]}"' >> /usr/local/bin/weasyprint-wrapper && \
    chmod +x /usr/local/bin/weasyprint-wrapper